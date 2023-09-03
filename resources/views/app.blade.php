<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @notifyCss
    @vite('resources/js/app.js')
    
    <script>
      const showNotify = () => {
        <x-notify::notify />
      }

    </script>
    @inertiaHead
  </head>
  <body>
    <div>
      @inertia
    </div>
    
    @notifyJs 

  </body>
</html>