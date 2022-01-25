<?php

namespace Tiptap\Nodes;

use Tiptap\Core\Node;

class OrderedList extends Node
{
    public static $name = 'orderedList';

    public function parseHTML()
    {
        return [
            [
                'tag' => 'ol',
            ],
        ];
    }

    public static function addAttributes()
    {
        return [
            'order' => [
                'parseHTML' => fn ($DOMNode) => (int) $DOMNode->getAttribute('start') ?: null,
            ],
        ];
    }

    public function renderHTML($node)
    {
        // TODO: Move to `addAttributes`
        $attrs = [];

        if (isset($node->attrs->order)) {
            $attrs['start'] = $node->attrs->order;
        }

        return ['ol', $attrs, 0];
    }
}
