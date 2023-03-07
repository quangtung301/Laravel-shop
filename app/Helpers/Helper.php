<?php

namespace App\Helpers;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
class Helper
{
//    public static function menu($menu,$parent_id =0, $char=''){
//        $html ='';
//
//        foreach ($menu as $key =>$m){
//
//           if($m->parent_id == $parent_id){
//               $html .='
//                   <tr>
//
//            <td>' . $m->id . '</td>
//            <td>' . $char . $m->name . '</td>
//            <td>' . self::active($m->active) . '</td>
//            <td>' . $m->updated_at . '</td>
//            <td>
//            <a class="btn btn-primary btn-sm" href="/admin/menu/edit/' . $m->id . ' ">
//            <i class="fas fa-edit" aria-hidden="true"></i></a>
//            <a href="#" class="btn btn-danger btn-sm" onclick="removeRow('. $m->id.',\'/admin/menu/destroy\')">
//            <i class="fa fa-trash" aria-hidden="true"></i>
//
//</a>
//</td>
//            </tr>
//               ';
//
//
//               unset($menu[$key]);
//               $html .= self::menu($menu,$m->id,$char .'|----');
//           }
//        }
//
//        return $html;
//    }

    public static function menu($menus, $parent_id = 0, $char = '')
    {
        $html = '';

        foreach ($menus as $key => $m) {
            if ($m->parent_id == $parent_id) {
                $html .= '
                    <tr>
                        <td>' . $m->id . '</td>
                        <td>' . $char . $m->name . '</td>
                        <td>' . self::active($m->active) . '</td>
                        <td>' . $m->updated_at . '</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/admin/menus/edit/' . $m->id . '">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm"
                                onclick="removeRow(' . $m->id . ', \'/admin/menus/destroy\')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                ';

                unset($menus[$key]);

                $html .= self::menu($menus, $m->id, $char . '|--');
            }
        }

        return $html;
    }


    public static function active($active = 0): string
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">NO</span>'
            : '<span class="btn btn-success btn-xs">YES</span>';
    }


    public static function price($price = 0, $priceSale = 0)
    {
        if ($priceSale != 0) return number_format($priceSale);
        if ($price != 0)  return number_format($price);
        return '<a href="/lien-he.html">Liên Hệ</a>';
    }



    public static function menus($menu, $parent_id = 0) :string
    {
        $html = '';
        foreach ($menu as $key => $m) {
            if ($m->parent_id == $parent_id) {
                $html .= '
                    <li>
                        <a href="/danh-muc/' . $m->id . '-' . Str::slug($m->name, '-') . '.html">
                            ' . $m->name . '
                        </a>';

                unset($menu[$key]);

                if (self::isChild($menu, $m->id)) {
                    $html .= '<ul class="sub-menu">';
                    $html .= self::menus($menu, $m->id);
                    $html .= '</ul>';
                }

                $html .= '</li>';
            }
        }

        return $html;
    }

    public static function isChild($menus, $id) : bool
    {
        foreach ($menus as $menu) {
            if ($menu->parent_id == $id) {
                return true;
            }
        }

        return false;
    }

    public static function getStatus($status = 1): string
    {
        return $status == 1 ? '<span class="btn btn-danger btn-xs">Đơn hàng chưa xác nhận</span>'
            : '<span class="btn btn-success btn-xs">Đơn hàng đã xác nhận</span>';
    }


}
