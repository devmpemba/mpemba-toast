<?php

namespace SalimMbise\ToastLibrary;

class Toast
{
    public function __construct()
    {
        $this->loadAssets();
    }

    // Load CSS and JS for the toast notifications
    private function loadAssets()
    {
        echo '<link rel="stylesheet" type="text/css" href="/assets/css/toast.css">';
        echo '<script src="/assets/js/toast.js"></script>';
    }
    

    // Generate the toast container where notifications will appear
    public function renderToastContainer()
    {
        echo '<div class="toast-container"></div>';
    }

    // Add a toast notification to the page
    public function addToast($message, $type = 'success', $duration = 3000)
    {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    showToast('$message', '$type', $duration);
                });
              </script>";
    }
}
