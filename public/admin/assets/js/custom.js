$(document).ready(function(){
    /**
     * Delete alert
     * @param parameter to delete
     */
     deleteMethod =  function (slug) {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "error",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location = window.location.pathname+'/delete/'+slug;
            }
        });
    }
    
    /**
     *  All About Search
     */
    $('#searchField').prop('selectedIndex',0); // Reset Search Select
    var searchItems = "&nbsp;"+"disableed";
    var countSelect = 0;
    $("select").change(function(){
        var newField = '&nbsp' + $(this).val() + '&nbsp';
        if(newField != null && newField != ""){
            var name = $(this).val();
            var placeholder = $("#searchField option:selected").text();
            var html = "<div style=\"margin: 4px 0;\" class=\"col-md-2\">\n" +
            "<input id='search' type=\"text\" name=\"" + name + "\" placeholder=\"" + placeholder + "\" class=\"form-control\">\n"  +
            "</div>";
            if(searchItems.indexOf(newField) == -1){
                countSelect = countSelect + 1;
                $(".search-field").append(html);
                $("#searchForm").show();
                $("#searchButton").show();
                searchItems = searchItems + newField + '&nbsp;';
                if (countSelect > 5) {
                    $("#searchButton").css({
                        //'margin-left': '5px',
                        //'margin-top': '5px'
                    });
                }
            }
        }
    });
});
