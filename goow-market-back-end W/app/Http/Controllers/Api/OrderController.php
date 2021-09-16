<?php

namespace App\Http\Controllers\Api;

use App\Events\OrderStatus;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Mail\Order\Rejected;
use App\Mail\Order\Confirmed;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index()
    {
        return [
            'orders' => auth()->user()->load(['orders' =>
                fn ($q) => $q->with('products')->whereIn('orders.status', explode(',', request('status')))])->orders
        ];
    }

    public function update(Order $order)
    {
        $merchant = $order->merchants()->whereUserId(auth()->id())->first();
        $merchant->pivot->status = request('status');
        $merchant->pivot->save();
        
        $clientEMail = User::find($order['user_id'])->email;
        $clientPhone = User::find($order['user_id'])->phone;

        $completed = $order->merchants()->wherePivot('status', 'COMPLETED')->exists();
        $inProgress = $order->merchants()->wherePivot('status', 'IN_PROGRESS')->exists();
        $ready = $order->merchants()->wherePivot('status', 'READY')->exists();
        $pending = $order->merchants()->wherePivot('status', 'PENDING')->exists();

        if (request('status') === 'REJECTED') {
            $order->update(['status' => 'REJECTED']);
            event(new OrderStatus(
                    $order,
                    'REJECTED',
                    'rejetée',
                    'votre commande est rejetée')
            );
            Mail::to($clientEMail)->queue(new Rejected($order));
            return 'REJECTED';
        }

        if ($pending && !$inProgress && !$ready && !$completed) {
            $order->update(['status' => 'PENDING']);
            return 'PENDING';
        }

        if ($inProgress && !$pending && !$ready && !$completed) {
            $order->update(['status' => 'IN_PROGRESS']);
            event(new OrderStatus(
                $order,
                'IN_PROGRESS',
                'commande en cour',
                'votre commande a bien été prise en charge et en cours de traitement')
            );

            return [
                'status' => 'IN_PROGRESS'
            ];
        }

        if ($ready && !$pending && !$inProgress && !$completed) {
            $order->update(['status' => 'READY']);
            event(new OrderStatus(
                $order,
                'READY',
                'commande prête',
                'votre commande et prête merci de venir la récupérer')
            );

            Mail::to($clientEMail)->queue(new Confirmed($order));
            return 'READY';
        }

        if ($completed && !$inProgress && !$ready && !$pending) {
            $order->update(['status' => 'COMPLETED']);
            event(new OrderStatus(
                $order,
                'COMPLETED',
                'commande terminée',
                'votre commande a été récupérée, à bientôt')
            );

            return 'COMPLETED';
        }
    }
}
