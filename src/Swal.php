<?php

namespace RulWeb\Swal;

use Illuminate\Session\Store;
use Illuminate\Support\Collection;

/**
 * Class Swal
 * @method \RulWeb\Swal\Swal title($value)
 * @method \RulWeb\Swal\Swal titleText($value)
 * @method \RulWeb\Swal\Swal text($value)
 * @method \RulWeb\Swal\Swal html($value)
 * @method \RulWeb\Swal\Swal type($value)
 * @method \RulWeb\Swal\Swal target($value)
 * @method \RulWeb\Swal\Swal input($value)
 * @method \RulWeb\Swal\Swal width($value)
 * @method \RulWeb\Swal\Swal padding($value)
 * @method \RulWeb\Swal\Swal background($value)
 * @method \RulWeb\Swal\Swal customClass($value)
 * @method \RulWeb\Swal\Swal timer($value)
 * @method \RulWeb\Swal\Swal animation($value)
 * @method \RulWeb\Swal\Swal allowOutsideClick($value)
 * @method \RulWeb\Swal\Swal allowEscapeKey($value)
 * @method \RulWeb\Swal\Swal allowEnterKey($value)
 * @method \RulWeb\Swal\Swal showConfirmButton($value)
 * @method \RulWeb\Swal\Swal showCancelButton($value)
 * @method \RulWeb\Swal\Swal confirmButtonText($value)
 * @method \RulWeb\Swal\Swal cancelButtonText($value)
 * @method \RulWeb\Swal\Swal confirmButtonColor($value)
 * @method \RulWeb\Swal\Swal cancelButtonColor($value)
 * @method \RulWeb\Swal\Swal confirmButtonClass($value)
 * @method \RulWeb\Swal\Swal cancelButtonClass($value)
 * @method \RulWeb\Swal\Swal confirmButtonAriaLabel($value)
 * @method \RulWeb\Swal\Swal cancelButtonAriaLabel($value)
 * @method \RulWeb\Swal\Swal buttonsStyling($value)
 * @method \RulWeb\Swal\Swal reverseButtons($value)
 * @method \RulWeb\Swal\Swal focusConfirm($value)
 * @method \RulWeb\Swal\Swal focusCancel($value)
 * @method \RulWeb\Swal\Swal showCloseButton($value)
 * @method \RulWeb\Swal\Swal closeButtonAriaLabel($value)
 * @method \RulWeb\Swal\Swal showLoaderOnConfirm($value)
 * @method \RulWeb\Swal\Swal imageUrlimageWidth($value)
 * @method \RulWeb\Swal\Swal imageHeight($value)
 * @method \RulWeb\Swal\Swal imageAlt($value)
 * @method \RulWeb\Swal\Swal imageClass($value)
 * @method \RulWeb\Swal\Swal inputPlaceholder($value)
 * @method \RulWeb\Swal\Swal inputValue($value)
 * @method \RulWeb\Swal\Swal inputAutoTrim($value)
 * @method \RulWeb\Swal\Swal inputClass($value)
 * @method \RulWeb\Swal\Swal progressSteps($value)
 * @method \RulWeb\Swal\Swal useRejections($value)
 * @package App\Ext\Swal
 */
class Swal
{
    /**
     * @var Store
     */
    public $session;

    /**
     * @var Collection
     */
    public $options = [
        'title' => null,
        'text' => null,
        'html' => null,
        'type' => null,
    ];

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    public function __call($option, $args)
    {
        $this->options[$option] = $args[0];
        $this->flash();

        return $this;
    }

    /**
     * @return void
     */
    public function flash()
    {
        if ($this->options['html'] === true && !empty($this->options['text'])) {
            $this->options['html'] = $this->options['text'];
            $this->options['text'] = null;
        }

        $options = [];

        foreach ($this->options as $key => $option) {
            if ($option !== null)
                $options[$key] = $option;
        }

        $this->session->flash('swal', json_encode($options, JSON_UNESCAPED_UNICODE));
    }

    public function error($title, $message = null, $html = false)
    {
        $this->message($title, $message, 'error', $html);

        return $this;
    }

    public function message($title, $message, $type = null, $html = false)
    {
        $this->options['title'] = $title;
        $this->options['type'] = $type;
        $html ? $this->options['html'] = $message : $this->options['text'] = $message;

        $this->flash();

        return $this;
    }

    public function info($title, $message = null, $html = false)
    {
        $this->message($title, $message, 'info', $html);

        return $this;
    }

    public function warning($title, $message = null, $html = false)
    {
        $this->message($title, $message, 'warning', $html);

        return $this;
    }

    public function success($title, $message = null, $html = false)
    {
        $this->message($title, $message, 'success', $html);

        return $this;
    }
}
