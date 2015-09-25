@if (Session::has('notifier.notice'))
    <script>
        new PNotify({!! Session::get('notifier.notice') !!});
    </script>
@endif