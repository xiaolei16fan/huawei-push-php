<?php
/**
 * Created by IntelliJ IDEA.
 *
 * Time: 上午9:31
 *
 * @author keal<qihanw@medlinker.com>
 */

define ( 'HWPush_Root', dirname ( __FILE__ ) . '/' );
function hwpushAutoload($classname) {
    $parts = explode ( '\\', $classname );
    $path = HWPush_Root . implode ( '/', $parts ) . '.php';
    if (file_exists ( $path )) {
        include ($path);
    }
}

spl_autoload_register ( 'hwpushAutoload' );
