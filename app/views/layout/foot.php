    <script src="/assets/libs/jquery-3.4.1.min.js"></script>
    <script>

        $('.face').click(function (e) {
            e.preventDefault();
            var value = $(this).data('value');

            switch (value) {
                case 'cola':
                    alert('Ahh, so refreshing!');
                    break;
                case 'donut':
                    alert('Mmmm, donut');
                    break;
            }
        });

    </script>
</body>
</html>