
$(function () {
    // $("#table").DataTable();

$( "#tablecontents" ).sortable({
    items: "tr",
    cursor: 'move',
    opacity: 0.6,
    update: function() {
        sendOrderToServer();
    }
});

function sendOrderToServer() {
    var tasks = [];
    var token = $('meta[name="csrf-token"]').attr('content');
    $('tr').each(function(index, element) {
        if ($(this).find('.name').text().trim()) {
            tasks.push({
                name: $(this).find('.name').text().trim(),
                priority: index+1,
                projectId: $(this).find('.projectId').val().trim()
            });
        }
    });

    console.log('tasks', tasks)

    $.ajax({
    type: "POST",
    dataType: "json",
    url: "/tasks/updateBulk",
        data: {
        tasks: tasks,
        _token: token
    },
    success: function(response) {
        console.log("response ", response)
        if (response.status == "success") {
            console.log(response);
        } else {
            console.log(response);
                }
            }
          });
        }
      });
