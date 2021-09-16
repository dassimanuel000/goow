<?php


namespace App\Classes;


use App\Models\Page;
use OptimistDigital\MenuBuilder\Classes\MenuLinkable;

class PagesMenuLinkable extends MenuLinkable
{
    /**
     * Get the menu link identifier that can be used to tell different custom
     * links apart (ie 'page' or 'product').
     *
     * @return string
     **/
    public static function getIdentifier(): string {
        return 'page';
    }

    /**
     * Get menu link name shown in  a dropdown in CMS when selecting link type
     * ie ('Product Link').
     *
     * @return string
     **/
    public static function getName(): string {
        return 'Page link';
    }

    /**
     * Get list of options shown in a select dropdown.
     *
     * Should be a map of [key => value, ...], where key is a unique identifier
     * and value is the displayed string.
     *
     * @return array
     **/
    public static function getOptions($locale): array {
        return Page::all()
            ->pluck('title', 'id')
            ->toArray();
    }

    /**
     * Get the subtitle value shown in CMS menu items list.
     *
     * @param string $value
     * @param array $parameters The JSON parameters added to the item.
     * @return string
     **/
    public static function getDisplayValue($value = null, array $parameters = null) {
        return 'Page: ' . Page::find($value)->title;
    }

    /**
     * Get the value of the link visible to the front-end.
     *
     * Can be anything. It is up to you how you will handle parsing it.
     *
     * This will only be called when using the nova_get_menu()
     * and nova_get_menus() helpers or when you call formatForAPI()
     * on the Menu model.
     *
     * @param string $value The key from options list that was selected.
     * @param array $parameters The JSON parameters added to the item.
     * @return string
     **/
    public static function getValue($value = null, array $parameters = null) {
        return Page::find($value);
    }
}
