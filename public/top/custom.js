;

function GetDay(day) {
    if (day.length == 1) {
        day = "0" + day;
    }
    return day;
}

function GetMonth(month) {

    switch (month) {
        case "January":
            return "01";
        case "February":
            return "02";
        case "March":
            return "03";
        case "April":
            return "04";
        case "May":
            return "05";
        case "June":
            return "06";
        case "July":
            return "07";
        case "August":
            return "08";
        case "September":
            return "09";
        case "October":
            return "10";
        case "November":
            return "11";
        case "December":
            return "12";
    }
}

var randomSearches = {

    init: function () {

        $('#birthday-search-submit').click(function (e) {
            e.preventDefault();
            window.location.href = '/charts/singles-chart/' + $('#birthday-year-search').val() + $('#birthday-month-search').val() + $('#birthday-day-search').val() + '/7501';
        });

        $('#fav-song-submit').click(function (e) {
            e.preventDefault();
            window.location.href = '/search/singles/' + $('#fav-song').val();
        });

        $('#fav-artist-submit').click(function (e) {
            e.preventDefault();
            window.location.href = '/search/artists/' + $('#fav-artist').val();
        });

        $('.title-search-submit').click(function (e) {

            e.preventDefault();

            var searchTerm = helper.encodeProductName($(this).siblings('.title-search').val());
            var searchType = $('.chart-type').find('.selected').text();

            if (searchType == "") {
                searchType = "Artists";
            }

            window.location.href = '/search/' + searchType.toLowerCase() + '/' + searchTerm + '/';
        });

    }

};

var charts = {

    init: function () {

        $('.chart-date-submit').click(function (e) {

            e.preventDefault();

            var year = $(this).siblings().children('.year-search').val();
            var month = $(this).siblings().children('.month-search').val();
            var day = $(this).siblings().children('.day-search').val();
            var chartName = $(this).data("chart-name");

            var chartTypeId = $('#this-chart-type').val();

            var pathName = window.location.pathname;
            if (pathName.toLowerCase().indexOf('/charts/') >= 0) {
                window.location.href = '/charts/' + chartName + '/' + year + month + day + '/' + chartTypeId;
            } else {
                window.location.href = '/new-releases/' + year + month + day;
            }
        });

        $('.chart-types-l2').click(function (e) {

            e.preventDefault();

            var selectedItem = $('.selected');
            selectedItem.removeClass('selected');
            $(this).addClass('selected');
            var chartName = $(".selected").data("chart-name");

            var thisUrl = document.URL;
            if (!/([0-9]){8}/.test(thisUrl)) {
                window.location.href = '/charts/' + chartName + '/';
            } else {
                window.location.href = '/charts/' + chartName + '/' + $('.year-search').val() + $('.month-search').val() + $('.day-search').val() + '/' + $('.selected').attr('data-chart-id');
            }

        });

        $('.select-chart').click(function (e) {

            e.preventDefault();

            var searchTerm = helper.encodeProductName($('#search-term').text());
            var searchType = $(this).text();

            window.location.href = '/search/' + searchType.toLowerCase() + '/' + searchTerm + '/';
        });


        $('.chart-runs-icon').click(function (e) {


            e.preventDefault();
            var html;
            var that = this;

            if ($(this).hasClass("selected")) {
                $(this).removeClass("selected").parent().parent().siblings(".chart-runs").remove();
            } else {

                _gaq.push(['_trackPageview', '/chart-facts/' + $(this).data("productid") + '/' + $(this).data("chartid") + '/' + $(this).parents('tr').find('.artist').text().trim().replace(/\//g, ' ') + '/' + $(this).parents('tr').find('.title').text().trim().replace(/\//g, ' ')]);

                $.ajax({
                    url: '/Umbraco/Api/ChartsApi/GetMore?productId=' + $(this).data("productid") + '&chartId=' + $(this).data("chartid"),
                    success: function (data) {


                        if (data.Chart_Id != null) {
                            var position = (data.Position.length == 1) ? '0' + data.Position : data.Position;
                            var prevPosition = (data.Previous_Position.length == 1) ? '0' + data.Previous_Position : data.Previous_Position;
                            var peakPosition = (data.Peak_Position.length == 1) ? '0' + data.Peak_Position : data.Peak_Position;
                            var title = (data.Product_Name != null) ? data.Product_Name : '-';
                            var artistName = (data.Artist_Name != null) ? data.Artist_Name : '-';
                            var featArtist = (data.Featuring_Artist_Name != null) ? data.Featuring_Artist_Name : '-';
                            var label = (data.Label != null) ? data.Label : '-';
                            var catalogueNumber = (data.Catalogue_number != null) ? data.Catalogue_number : '-';
                            var firstChartDate = (data.First_Chart_Date != null) ? data.First_Chart_Date : '-';
                            var wksAt1 = (data.Weeks_At_No_1.length == 1) ? '0' + data.Weeks_At_No_1 : data.Weeks_At_No_1;
                            var wksTop10 = (data.Weeks_In_Top_10.length == 1) ? '0' + data.Weeks_In_Top_10 : data.Weeks_In_Top_10;
                            var wksTop20 = (data.Weeks_In_Top_20.length == 1) ? '0' + data.Weeks_In_Top_20 : data.Weeks_In_Top_20;
                            var wksTop40 = (data.Weeks_In_Top_40.length == 1) ? '0' + data.Weeks_In_Top_40 : data.Weeks_In_Top_40;
                            var wksTop75 = (data.Weeks_In_Top_75.length == 1) ? '0' + data.Weeks_In_Top_75 : data.Weeks_In_Top_75;
                            var wksTop100 = (data.Weeks_In_Top_100.length == 1) ? '0' + data.Weeks_In_Top_100 : data.Weeks_In_Top_100;

                            html = '<tr class="chart-runs">';
                            html += '<td colspan="7">';
                            html += '<div class="chart-runs-info">';

                            html += '<div class="track-info">';
                            html += '<div class="grid">';
                            html += '<div class="grid__cell unit-2-12--desktop">';

                            if(position != 00 && prevPosition != 00) {
                                html += '<div class="position-info"><h4>Peak Pos</h4><span class="peak">' + peakPosition + '</span></div>';
                            }
                            else {
                                html += '<div class="position-info"><h4>Peak Pos</h4><span class="peak bigger">' + peakPosition + '</span></div>';
                            }

                            if(position != 00){
                                html += '<div class="position-info"><h4>This week</h4><span class="last-week">' + position + '</span></div>';
                            }

                            if (prevPosition != 00) {
                                html += '<div class="position-info"><h4>Last week</h4><span class="last-week">' + prevPosition + '</span></div>';
                            }

                            html += '</div>';
                            html += '<div class="grid__cell unit-3-12--desktop">';
                            html += '<div class="cover"><img src="' + data.Img_Url + '" alt=""></div>';
                            html += '</div>';
                            html += '<div class="grid__cell unit-7-12--desktop"><table class="track-table">';
                            html += '<tr><td>Title:</td><td>' + title + '</td></tr>';
                            html += '<tr><td>Artist:</td><td>' + artistName + '</td></tr>';
                            html += '<tr><td>Label:</td><td>' + label + '</td></tr>';
                            html += '<tr><td>Cat no:</td><td>' + catalogueNumber + '</td></tr>';
                            html += '<tr><td>First charted:</td><td>' + firstChartDate + '</td></tr>';
                            html += '</table></div>';
                            html += '</div>';
                            html += '</div>';

                            html += '<div class="weeks-in"><div class="grid">';
                            html += '<section class="weeks-in-list"><header><h3>Weeks</h3></header>';
                            html += '<div class="grid__cell unit-2-12--desktop"><div class="weeks-in-chart"><h4 class="title">No. 1</h4><div class="count">' + wksAt1 + '</div></div></div>';
                            html += '<div class="grid__cell unit-2-12--desktop"><div class="weeks-in-chart"><h4 class="title">Top 10</h4><div class="count">' + wksTop10 + '</div></div></div>';
                            html += '<div class="grid__cell unit-2-12--desktop"><div class="weeks-in-chart"><h4 class="title">Top 20</h4><div class="count">' + wksTop20 + '</div></div></div>';
                            html += '<div class="grid__cell unit-2-12--desktop"><div class="weeks-in-chart"><h4 class="title">Top 40</h4><div class="count">' + wksTop40 + '</div></div></div>';
                            html += '<div class="grid__cell unit-2-12--desktop"><div class="weeks-in-chart"><h4 class="title">Top 75</h4><div class="count">' + wksTop75 + '</div></div></div>';
                            html += '<div class="grid__cell unit-2-12--desktop"><div class="weeks-in-chart"><h4 class="title">Top 100</h4><div class="count">' + wksTop100 + '</div></div></div>';
                            html += '</div></div>';

                            if (data.Chart_Runs != null) {
                                for (var i = 0; i < data.Chart_Runs.length; i++) {

                                    html += '<section class="chart-run-list"><header><h3>Chart run <small>(' + data.Chart_Runs[i].Total_Weeks + ' weeks / ' + data.Chart_Runs[i].Start_Date_Display + ' - ' + data.Chart_Runs[i].End_Date_Display + ')</small></h3><div class="key"><div class="highest-icon"></div>= Highest Position <div class="latest-icon"></div>= This Week</div></header>';
                                    html += '<ul class="chart-run-list">';

                                    if (data.Chart_Runs[i].Runs != null) {
                                        for (var x = 0; x < data.Chart_Runs[i].Runs.length; x++) {
                                            
                                            if(data.Chart_Id.indexOf("-") > -1){
                                                var chartId = data.Chart_Id.substring(0, data.Chart_Id.indexOf("-")),
                                                    classes = '';
                                            }
                                            else {
                                                var chartId = data.Chart_Id,
                                                    classes = '';
                                            }

                                            if (data.Chart_Runs[i].Runs[x].Position == peakPosition) {
                                                classes += 'highest ';
                                            }

                                            if (data.Chart_Runs[i].Runs[x].This_Week){
                                                classes += "latest";
                                            }

                                            if(classes){
                                                classes = 'class="' + classes + '"';
                                            }

                                            html += '<li><a ' + classes + 'data-date="' + data.Chart_Runs[i].Runs[x].Date_Display + '" href="/charts/' + data.Chart_Url + '/' + data.Chart_Runs[i].Runs[x].Id + '/' + chartId + '">' + data.Chart_Runs[i].Runs[x].Position + '</a></li>';
                                        }
                                    }
                                    html += '</ul>';
                                    html += '</section>';
                                }
                            }

                            html += '<a href="" class="close"></a>'
                            html += '</div>';
                            html += '</td>';
                            html += '</tr>';

                            $(that).parents(".chart-positions").find(".selected").removeClass("selected").parent().parent().siblings(".chart-runs").remove();
                            $(that).addClass("selected");
                            $(that).parent().parent().after(html);
                        }

                        chartRuns.init();
                    }
                })
            }
        });

        $(".chart-positions").on("click", ".chart-runs .close", function (e) {

            e.preventDefault();

            $(this).parents(".chart-runs").remove().parent().parent().siblings(".chart-runs-icon").removeClass("selected");





        })

        this.paginate();

    },

    paginate: function () {

        var grid = $('#pagination-grid');
        var pageNav = grid.find('.pagination');
        var totalResults = grid.attr("data-totalresults");
        var resultsPerPage = 22;

        grid.pajinate({
            items_per_page: resultsPerPage,
            items_selector: ":not(.actions-view)",
            abort_on_small_lists: false,
            show_first_last: false,
            nav_label_first: 'First',
            nav_label_last: 'Last',
            num_page_links_to_display: 5,
            nav_panel_id: '.pagination',
            item_container_id: '.chart-results-content',
            nav_label_prev: 'Previous',
            nav_label_next: 'Next'
        });

    }

};

var archive = {

    init: function () {

        //Top
        $('#archive-top-date-submit').click(function (e) {
            e.preventDefault();
            if ($('#archive-top-year-search').val() != "" && $('#archive-top-month-search').val() != "" && $('#archive-top-day-search').val() != "") {
                window.location.href = '/charts/singles-chart/' + $('#archive-top-year-search').val() + $('#archive-top-month-search').val() + $('#archive-top-day-search').val() + '/7501';
            }
        });

        $('#archive-top-artist-submit').click(function (e) {
            e.preventDefault();
            window.location.href = '/search/artists/' + helper.encodeProductName($('#archive-top-artist-input').val()) + '/';
        });

        $('#archive-top-title-submit').click(function (e) {
            e.preventDefault();
            window.location.href = '/search/singles/' + helper.encodeProductName($('#archive-top-title-input').val()) + '/';
        });

        //Side bar
        $('#archive-date-submit').click(function (e) {
            e.preventDefault();
            if ($('#archive-year-search').val() != "" && $('#archive-month-search').val() != "" && $('#archive-day-search').val() != "") {
                window.location.href = '/charts/singles-chart/' + $('#archive-year-search').val() + $('#archive-month-search').val() + $('#archive-day-search').val() + '/7501';
            }
        });

        $('#archive-artist-submit').click(function (e) {
            e.preventDefault();
            window.location.href = '/search/artists/' + helper.encodeProductName($('#archive-artist-input').val()) + '/';
        });

        $('#archive-title-submit').click(function (e) {
            e.preventDefault();
            window.location.href = '/search/singles/' + helper.encodeProductName($('#archive-title-input').val()) + '/';
        });

    }

};

var newsLists = {

    paginate: function () {

        var grid = $('#pagination-grid');
        var pageNav = grid.find('.pagination');
        var totalResults = grid.attr("data-totalresults");
        var resultsPerPage = 16;

        //if (totalResults < resultsPerPage) {
        //    pageNav.hide();
        //} else {
        //    pageNav.show();
        //};

        grid.pajinate({
            items_per_page: resultsPerPage,
            abort_on_small_lists: false,
            show_first_last: false,
            nav_label_first: 'First',
            nav_label_last: 'Last',
            num_page_links_to_display: 5,
            nav_panel_id: '.pagination',
            item_container_id: '.news-list',
            nav_label_prev: 'Previous',
            nav_label_next: 'Next'
        });
    }

};

var artists = {

    init: function () {

        var pageNav = $('#artist-pagination-grid').find('.pagination');
        var totalResults = $('#artist-pagination-grid').attr("data-totalresults");

        $('#artist-pagination-grid').pajinate({
            items_per_page: 4,
            abort_on_small_lists: false,
            show_first_last: false,
            nav_label_first: 'First',
            nav_label_last: 'Last',
            num_page_links_to_display: 5,
            nav_panel_id: '.pagination',
            item_container_id: '.artist-results-content',
            nav_label_prev: 'Previous',
            nav_label_next: 'Next'
        });
    }

};


var cookieBar = {
    init: function () {
        if (cookieBar.readCookie(cookieBar.cookieKey)) {
            $('#pnlCookie').hide();
        } else {
            $('#pnlCookie').show();
        }
    },

    cookieKey: 'cookieOCC',

    writeCookie: function (name, value, days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
        var cookieString = name + "=" + value + expires + "; path=/";
        document.cookie = cookieString;
    },

    readCookie: function (name) {
        var cookies = document.cookie.split(';');
        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i];
            while (cookie.charAt(0) == ' ') {
                cookie = cookie.substring(1, cookie.length);
            }
            if (cookie.indexOf(name + "=") == 0) {
                return cookie.substring(name.length + 1, cookie.length);
            }
        }
        return null;
    }
};

function acceptbtn_onclick() {
        cookieBar.writeCookie(cookieBar.cookieKey, 'true', 365);
        $('#pnlCookie').hide();
}

var helper = {

    encodeProductName: function (searchTerm) {
        searchTerm = searchTerm.replace(new RegExp("&", "g"), "_and_").replace(new RegExp("\\+", "g"), "_plus_");
        searchTerm = searchTerm.replace(new RegExp("\\/", "g"), "_slash_").replace(new RegExp("\\?", "g"), "_qum_");
        // Dots at the end of a url cause issues
        searchTerm = searchTerm.replace(new RegExp("\\.$", "g"), "_dot_")
        return searchTerm;
    }

};

$(document).ready(function () {

    randomSearches.init();
    archive.init();
    newsLists.paginate();
    charts.init();
    artists.init();
    cookieBar.init();
    
});