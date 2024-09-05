jQuery(document).ready(function($) {
    $('.filter-category').on('click', function(e) {
        e.preventDefault();

        var categoryId = $(this).data('category');
        
        $.ajax({
            url: ajax_params.ajax_url,  // Usando a URL passada pelo PHP
            type: 'POST',
            data: {
                action: 'filter_products',
                category_id: categoryId
            },
            success: function(response) {
                $('#products-list').html(response);
            },
            error: function(xhr, status, error) {
                console.log("Erro ao carregar produtos: " + error);
            }
        });
    });
});
