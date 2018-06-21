var submitData = [];

$(".role-select").change(function() {
    var value = this.value;
    var userIdChanged = $(this).attr("user-id");
    $("tr[user-id='" + userIdChanged + "']").addClass("highlighted");

    var hidden = $(".hidden-fields");
    var userRolePair = {userId: userIdChanged, roleValue: value};

    for(var i = 0; i < submitData.length; i++) {
        if(submitData[i].userId == userIdChanged) {
            submitData.splice(i,1);
            break;
        }
    }

    submitData.push(userRolePair);

    $("#userRolePairs").val(JSON.stringify(submitData));
});

$(".delete-user").click(function() {
    var username = $(this).attr("user-name");
    var action = $(this).attr("action");
    $("body").overhang({
        type: "confirm",
        message: "Wollen Sie den User "+username+" wirklich löschen?",
        overlay: true,
        callback: function(selection) {
            if(selection) {
                document.location.href= action;
            }
        }
    }); 
});