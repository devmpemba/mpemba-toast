<?
namespace SalimMbise\ToastLibrary;

class Toast
{
    protected $messages = [];

    public function __construct()
    {
        $this->loadAssets();
    }

    // Load CSS and JS for the toast notifications
    private function loadAssets()
    {
        echo '<link rel="stylesheet" type="text/css" href="' . asset('vendor/mpemba-toast/css/toast.css') . '">';
        echo '<script src="' . asset('vendor/mpemba-toast/js/toast.js') . '"></script>';
    }

    // Add a toast notification
    public function addToast($message, $type = 'success', $duration = 3000)
    {
        $this->messages[] = compact('message', 'type', 'duration');
    }

    // Render the toast messages as inline script
    public function renderToasts()
    {
        $scripts = '';
        foreach ($this->messages as $toast) {
            $scripts .= "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    showToast('{$toast['message']}', '{$toast['type']}', {$toast['duration']});
                });
            </script>";
        }
        echo $scripts;
    }
}
