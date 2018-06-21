<script>
$.get("<?php echo root_url();?>action/serverState", function(data) {
    var servers = JSON.parse(data);
    $(".server-state").empty();
    servers.forEach(function(element) {
        var state = element[1] ? "<span class='online'>Online</span>" : "<span class='offline'>Offline</span>";
        var html = element[0].name + ": " + state + "<br/>";
        $(".server-state").append(html);
    });
})
.fail(function() {
    $(".server-state").empty();
    $(".server-state").append("<span class='offline'>Error</span>");
});
</script>

<h3>Server-Status</h3>
<div class="server-state">
    <span class="loading"><i class="fas fa-spinner fa-pulse"></i> Laden...</span>
</div>