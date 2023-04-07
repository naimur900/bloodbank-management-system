export default {
    toggleTags(selectors) {
        selectors.forEach(element => {
            if($(element).hasClass('d-none')){
                $(element).removeClass('d-none');
            }
            else{
                $(element).addClass('d-none');
            }
        });
    }
}