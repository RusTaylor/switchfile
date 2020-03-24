$(document).ready(() => {
    $(document).on('click', '.btn-delete-theme', (e) => {
        let element = e.target;

        if ($(element).html() === 'close') {
            element = element.closest('button');
        }

        deleteTheme(element.dataset.themeid)
    })
})

function deleteTheme(themeId) {
    $.ajax({
        url: '/panel/api/deleteTheme',
        type: 'post',
        data: {
            themeId: themeId
        },
        success: (res) => {
            alertify.success(res['message'])
            setTimeout(() => {
                window.location.reload()
            }, 2500)
        }
    })
}
