function filter() {//= document.onload

  var
    filters = {
      arr: null,
      prix: null,
      rasage: null
    };
    

  function updateFilters() {
    $('.js-salon').hide().filter(function () {
//        console.log(this);
      var
        self = $(this),
        result = true; // not guilty until proven guilty

      Object.keys(filters).forEach(function (filter) {

        if (filters[filter] && (filters[filter] != 'None')) {
          result = result && filters[filter] === self.data(filter);
        }
      });
      return result;
    }).show();
  }

  function bindDropdownFilters() {

    Object.keys(filters).forEach(function (filterName) {


      $('.display-filters li').each(function(){
        if($(this).css('display', 'block')){
            $(this).click(function(){
              $(this).hide();
              $('#' + filterName + '-filter').val('None').trigger('change');
            });
        }
      });

      $('#' + filterName + '-filter').on('change', function () {
        filters[filterName] = this.value;
        if(filters[filterName] != 'None'){
          $('.display-filters li.' + filterName).show().addClass('visible').html(filters[filterName]);
        }else{
          $('.display-filters li.' + filterName).hide().removeClass('visible');
        }
        updateFilters();
      });

    });
  }

  function resetFilter(that, filterName){
    $('#' + filterName + '-filter').attr('value', 'None');
  }

  bindDropdownFilters();
}