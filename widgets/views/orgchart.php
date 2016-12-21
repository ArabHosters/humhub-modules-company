<div id="orgChart"></div>
<script>
    $(function() {
        org_chart = $('#orgChart').orgChart({
            data: <?php echo $chart; ?>, // your data
            showControls: false, // display add or remove node button.
            allowEdit: false, // click the node's title to edit
            onAddNode: function(node) {
            },
            onDeleteNode: function(node) {
            },
            onClickNode: function(node) {
            },
            newNodeText: 'Add Child' // text of add button
        });
    });
</script>