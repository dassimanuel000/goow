export default function ({ $axios, redirect }) {
  return $axios.get('payment-cards').then((response) => {
    if (!response.data.payment_cards.length) return redirect('/profile')
  })
}
