<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
@if (!session('ofAge'))
<script src="{{ asset('js/age.js') }}"></script>
@endif
@if (Auth::user())

<script src="{{ asset('js/tinymce/js/tinymce/jquery.tinymce.min.js') }}"></script>
<script src="{{ asset('js/tinymce/js/tinymce/tinymce.min.js') }}"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script src="{{ asset('js/beerdata.js') }}"></script>
@endif
@if (Auth::user() && Request::segment(2) === 'statistics')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js" type="text/javascript"></script>
<script type="text/javascript">
    // Bar chart
    var barData = {
        labels: [@foreach ($beers as $beer)"{{ $beer['title'] }}",@endforeach],
        datasets: [
            {
                label: "Pints Sold",
                fillColor: "#C6C1BB",
                data: [@foreach ($beers as $beer)"{{ $beer['pints_sold'] }}",@endforeach]
            }
        ],
        multiTooltipTemplate: "<%=datasetLabel%> : <%= value %>"

    };
    var bar = document.getElementById("bar").getContext("2d");
    new Chart(bar, {
        type: 'bar',
        data: barData,
        options: {
            scales: {
                xAxes: [{
                    stacked: true
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            },
            multiTooltipTemplate: "<%=datasetLabel%> : <%=value%>"
        }
    });
</script>
@endif
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea",
    format: 'text',
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern codesample",
      "toc imagetools help"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic strikethrough | alignleft aligncenter alignright alignjustify | ltr rtl | bullist numlist outdent indent removeformat formatselect| link image media | emoticons charmap | code codesample | forecolor backcolor",
    browser_spellcheck: true,
    relative_urls: false,
    remove_script_host: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinymce.activeEditor.windowManager.open({
        file: '<?= route('elfinder.tinymce4') ?>',// use an absolute path!
        title: 'File manager',
        width: 900,
        height: 450,
        resizable: 'yes'
      }, {
        setUrl: function (url) {
          win.document.getElementById(field_name).value = url;
        }
      });
    }
  };

  tinymce.init(editor_config);
</script>
<script>
  {!! \File::get(base_path('vendor/barryvdh/laravel-elfinder/resources/assets/js/standalonepopup.min.js')) !!}
</script>
