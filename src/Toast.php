<?php

namespace SalimMbise\ToastLibrary;

class Toast
{
    protected $toasts = [];

    public function success($message, $duration = 3000)
    {
        $this->addToast($message, 'success', $duration);
        return $this;
    }

    public function error($message, $duration = 3000)
    {
        $this->addToast($message, 'error', $duration);
        return $this;
    }

    public function warning($message, $duration = 3000)
    {
        $this->addToast($message, 'warning', $duration);
        return $this;
    }

    public function info($message, $duration = 3000)
    {
        $this->addToast($message, 'info', $duration);
        return $this;
    }

    private function addToast($message, $type, $duration)
    {
        $this->toasts[] = [
            'message' => $message,
            'type' => $type,
            'duration' => $duration
        ];
    }

    public function renderToasts()
    {
        $scripts = '';

        foreach ($this->toasts as $toast) {
            $message = addslashes($toast['message']);
            $type = $toast['type'];
            $duration = $toast['duration'];

            $scripts .= "
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        showToast('$message', '$type', $duration);
                    });
                </script>
            ";
        }

        return $scripts;
    }
}
