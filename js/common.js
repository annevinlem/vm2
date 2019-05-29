$(document).ready(function () {

    $(document).on('click', '.items-list .item .action-buttons #delete', function (e) {

        var taskName = $(this).closest('.item').find('.name').text();

        $.ajax({
            type: "POST",
            url: "/delete.php",
            data: {
                "task_name": taskName,
            },
            cache: false,

            success: function (response) {
                console.log("Элемент удалён");

                $('.items-list').html(response);
                console.log(response);
            },
            error: function (response) {
                console.log("Ошибка сервера");
            }
        });
    });

    $(document).on('click', '.add-task #add-new-task', function (e) {

        var taskName = $('input[name="task_name"]').val();

        $.ajax({
            type: "POST",
            url: "/add.php",
            data: {
                "task_name": taskName,
            },
            cache: false,

            success: function (response) {
                console.log("Элемент удалён");
                $('input[name="task_name"]').val('');

                $('.items-list').html(response);
            },
            error: function (response) {
                console.log("Ошибка сервера");
            }
        });
    });

});