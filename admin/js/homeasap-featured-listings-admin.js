(function ($) {
  'use strict'

  $(function () {
    $('#homeasap-featured-listings-agent-search').on('focus', function () {
      $(this).val('')
    }).autocomplete({
      source: function (request, response) {
        $.ajax({
          url: 'https://api.homeasap.com/NPlay.Services.NPlayApi/api/agentsearch/autocomplete?term=' + encodeURIComponent(request.term) + '&size=10',
          dataType: 'json',
          type: 'GET',
          success: function (data) {
            var results = (data || []).filter(function (item) {
              return !!item.FirstName
            })
            response($.map(results, function (item) {
              return {
                label: item.FirstName + ' ' + item.LastName,
                value: item.FirstName + ' ' + item.LastName,
                suggest: item
              }
            }))
          }
        })
      },
      minLength: 3,
      select: function (event, ui) {
        console.log('Selected: ', ui.item.suggest)
        this.value = ''
        $(this).blur()
        $('.homeasap-featured-listings-shortcode-sample-agent').text(ui.item.suggest.Id)
      }
    }).autocomplete('instance')._renderItem = function (ul, item) {
      return $("<li class='homeasap-featured-listings-agent-search-li'><img src='" + item.suggest.ProfileImage + "'><span>" + item.label + '</span></li>').appendTo(ul)
    }

    $('.homeasap-featured-listings-shortcode-button-copy').on('click', function () {
      var copyText = document.getElementById('homeasap-featured-listings-shortcode-sample-code').innerText
      var tempInput = document.createElement('input')
      tempInput.style = 'position: fixed; left: -1000px; top: -1000px'
      tempInput.value = copyText
      document.body.appendChild(tempInput)
      tempInput.select()
      tempInput.setSelectionRange(0, 99999) /* For mobile devices */
      document.execCommand('copy')
      document.body.removeChild(tempInput)
      window.alert('Copied!')
    })
  })
})(window.jQuery)
