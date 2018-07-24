<?php
namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;
// This view helper class displays a menu bar.
class Menu extends AbstractHelper
{
    
    // Menu items array.
    protected $items = [];
    
    // Active item's ID.
    protected $activeItemId = '';
    
    
    // Constructor.
    public function __construct($items=[])
    {
        $this->items = $items;
    }
    
    // Sets menu items.
    public function setItems($items)
    {
        $this->items = $items;
    }
    
    // Sets ID of the active items.
    public function setActiveItemId($activeItemId)
    {
        $this->activeItemId = $activeItemId;
    }
    
    // Renders the menu.
    public function render()
    {
        if (count($this->items)==0)
            return ''; // Do nothing if there are no items.
            
            //$result = '<div class="collapse navbar-collapse navbar-ex1-collapse">';
            $result = '<ul class="nav navbar-nav navbar-right">';
            
            // Render items
            foreach ($this->items as $item) {
                $result .= $this->renderItem($item);
            }
            
            $result .= '</ul>';
            //$result .= '</div>';
            
            return $result;
    }
    
    // Renders an item.
    protected function renderItem($item)
    {
        $id = isset($item['id']) ? $item['id'] : '';
        $isActive = ($id==$this->activeItemId);
        $label = isset($item['label']) ? $item['label'] : '';
        $last = isset($item['last']) ? $item['last'] : false;
        $lastClass = '';
        if ($last) {
            $lastClass = ' last';
        }
        
        $result = '';
        
        if(isset($item['dropdown'])) {
            
            $dropdownItems = $item['dropdown'];
           

            $result .= '<li class="dropdown ' . ($isActive?'active':'') . '">';
            $result .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">';
            $result .= $label . ' <b class="caret"></b>';
            $result .= '</a>';
            
            $result .= '<ul class="dropdown-menu">';
            
            foreach ($dropdownItems as $item) {
                $link = isset($item['link']) ? $item['link'] : '#';
                $label = isset($item['label']) ? $item['label'] : '';
                $result .= '<li>';
                $result .= '<a href="'.$link.'">'.$label.'</a>';
                $result .= '</li>';
            }
            
            $result .= '</ul>';
            $result .= '</a>';
            $result .= '</li>';
            
        } else {
            $link = isset($item['link']) ? $item['link'] : '#';
            
            $result .= $isActive ? '<li class="active">' : '<li>';
            if (isset($item['img'])) {
                //$result .= '<a href="' . $link . '" style="background-size:26px 26px; background: transparent url(' . $item['img'] . ') no-repeat center center;">' . '&nbsp;&nbsp;&nbsp;' . '</a>';
                $result .= '<a class="image' . $lastClass . '" href="'.$link.'">';
                $result .= '<img style="width:17px; heigth:17px;" alt="" src="' . $item['img'] . '">';
                $result .= '</a>';
            } else {
                $result .= '<a href="'.$link.'">'.$label.'</a>';
            }
            $result .= '</li>';
        }
        
        return $result;
    }
}
