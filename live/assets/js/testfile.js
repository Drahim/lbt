function loadArticles(jobId){
    $.ajax({
        url: 'includes/serverside_loadArticles.php',
        data: {'JobId' : jobId},
        dataType: 'json',
        success: function(data){
            // DEMO PRINTING OF DATA
            $('#articleList').html('');
            for (article in data) {
                // PRESELECT OPTION DEPENDING ON MYSQL STATUS OF ARTICLE
                if (data[article].Status == 'N'){var opt1 = 'selected';};
                if (data[article].Status == 'B'){var opt2 = 'selected';};
                if (data[article].Status == 'F'){var opt3 = 'selected';};
                if (data[article].Status == 'U'){var opt4 = 'selected';};

                // CREATE TABLE ROW FOR EACH ARTICLE
                $('#articleList').append('<tr style="display: table-row" name="articleRow" id="article' + data[article].Pos + '">' +
                    '<td>' + '<span style="display: none;" name="articlePos">' + data[article].Pos +
            }

            showOrderInfos();
        }
    });
}/**
 * Created by Mokel on 16.02.14.
 */
