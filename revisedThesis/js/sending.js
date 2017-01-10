function sendingData(location, checkpoints){
    var checkpoint = JSON.stringify(checkpoints);
    var target = JSON.stringify(location);
    $.ajax({
        url: 'storing.php?checkpoints='+checkpoint+'&target='+target,
        type: 'GET',
        success: function(results) {
        }
    });
   }