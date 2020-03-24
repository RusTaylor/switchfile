let editFileId = 0;
let path = window.location.pathname;
let regex = /^\/panel\/edit\/(\d+)$/gm;
let regexResult = regex.exec(path)

let selectedLesson = '';

$(document).ready(() => {


    $.ajax({
        url: '/panel/api/getAllGroups',
        type: 'post',
        success: (response) => {
            if (response == null) {
                return;
            }

            response.forEach((groupData) => {

                if (groupData['alias'] === $('#groupName').val()) {
                    return ''
                }

                $('#groupName').append('<option value="' + groupData['alias'] + '">' + groupData['name'] + '</option>');
            })
        }
    })

    getCourse($('#groupName').val());
    getLessons($('#groupName').val(), $('#groupCourse').val())

    $('#groupName').on('change', (e) => {
        getCourse($(e.target).val(), true).then(() => {
            getLessons($('#groupName').val(), $('#groupCourse').val(), true)
        })
    })

    $('#groupCourse').on('change', () => {
        getLessons($('#groupName').val(), $('#groupCourse').val(), true)
    })

    $(document).on('click', '.btn-edit-file', (e) => {
        let element = e.target;
        $('#fileInput').val('')

        if ($(element).html() === 'edit') {
            element = element.closest('button');
        }

        getFileData(element.dataset.id).then((response) => { //TODO имеется дублирование, переделать
            editFileId = response['id']
            $('#fileTitle').val(response['name_file']);
            $('#filePath').html('Выбран файл: ' + response['to_way'])
        })
    })

    getFiles();

    $('#fileInput').on('change', () => {
        $('#filePath').html('Выбран другой файл')
    })

    $('#saveFileChanges').on('click', () => {
        saveFileChanges()
    })

    $('.btn-new-file').on('click', () => {
        editFileId = 0;
    })

    $(document).on('click', '.lesson-input', (e) => {
        selectedLesson = $(e.target).val();
    })

    $('#saveTheme').on('click', () => {
        saveThemeChanges();
    })

    $(document).on('click', '.btn-delete-file', (e) => {
        let element = e.target;

        if ($(element).html() === 'close') {
            element = element.closest('button');
        }

        deleteFile(element.dataset.id).then(() => {
            getFiles();
        })
    })
})


function getCourse(groupName, isChange = false) {
    return new Promise((resolve) => {


        $.ajax({
            url: '/panel/api/getCourses',
            type: 'post',
            data: {
                groupAlias: groupName
            },
            success: (response) => {
                if (response === null) {
                    resolve();
                    return;
                }

                if (isChange) {
                    rewriteCourses(response);
                    resolve()
                    return;
                }

                appendCourses(response);
                resolve()

            }
        })
    })
}

function appendCourses(courses) {
    courses.forEach((course) => {

        if (course['course'] == $('#groupCourse').val()) {
            return;
        }

        $('#groupCourse').append('<option value="' + course['course'] + '">' + course['course'] + '</option>');
    })
}

function rewriteCourses(courses) {
    let newCourses = ''

    courses.forEach((course) => {
        newCourses += '<option value="' + course['course'] + '">' + course['course'] + '</option>';
    })
    $('#groupCourse').html(newCourses)
}

function getLessons(group, course, isChange = false) {
    $.ajax({
        url: '/panel/api/getLessons',
        type: 'post',
        data: {
            group: group,
            course: course
        },
        success: (response) => {
            if (response === null) {
                return;
            }
            let lessons = '';

            let lastLessons = '';

            if (!isChange) {
                lastLessons = $('#lessons').html()
            }
            response.forEach((lesson) => {
                if (lesson['lesson'] === $('#targetedLesson').val()) {
                    return;
                }

                lessons += '<div class="form-check form-check-radio form-check-inline">\n' +
                    '                <label class="form-check-label">\n' +
                    '                    <input class="form-check-input lesson-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"\n' +
                    '                           value="' + lesson['lesson'] + '"> ' + lesson['lesson'] + '\n' +
                    '                    <span class="circle">\n' +
                    '                        <span class="check"></span>\n' +
                    '                    </span>\n' +
                    '                </label>\n' +
                    '            </div>'
            })

            $('#lessons').html(lastLessons + lessons)
        }
    })
}

function getFileData(fileId) {
    return new Promise((resolve) => {
        $.ajax({
            url: '/panel/api/getFileData',
            type: 'post',
            data: {
                fileId: fileId
            },
            success: (response) => {
                resolve(response)
            }
        })
    })
}

function getFiles() {
    const themeId = regexResult[1]

    if (themeId === undefined) {
        return;
    }

    $.ajax({
        url: '/panel/api/getFiles',
        type: 'post',
        data: {
            themeId: themeId
        },
        success: (res) => {
            if (res === null) {
                return;
            }
            let files = ''
            res.forEach((file, index) => {
                files += '<tr>\n' +
                    '                        <th scope="row">' + (index + 1) + '</th>\n' +
                    '                        <td>' + file['name_file'] + '</td>\n' +
                    '                        <td class="td-actions text-left">\n' +
                    '                            <div style="display: inline-flex">\n' +
                    '                                <button rel="tooltip" type="button" class="btn btn-success mr-2 btn-edit-file"\n' +
                    '                                        data-toggle="modal"\n' +
                    '                                        data-target="#modal-edit" data-id="' + file['id'] + '">\n' +
                    '                                    <i class="material-icons">edit</i>\n' +
                    '                                </button>\n' +
                    '                                <button rel="tooltip" class="btn btn-danger btn-delete-file"' +
                    '                                        data-id="' + file['id'] + '">\n' +
                    '                                    <i class="material-icons">close</i>\n' +
                    '                                </button>\n' +
                    '                            </div>\n' +
                    '                        </td>\n' +
                    '                    </tr>'
            })

            $('#filesTable').html(files)
        }
    })
}

function saveFileChanges() {
    let formData = new FormData;
    let file = $('#fileInput')
    let fileName = $('#fileTitle')

    formData.append('fileId', editFileId)
    formData.append('fileName', fileName.val())
    formData.append('file', file.prop('files')[0]);
    formData.append('themeId', regexResult[1])

    $.ajax({
        url: '/panel/api/saveFileChanges',
        type: 'post',
        processData: false,
        contentType: false,
        data: formData,
        success: (res) => {
            alertify.success(res['message'])
            getFiles()
            $('#fileTitle').val('')
            $('#fileInput').val('')
            $('#filePath').html('Файл не выбран')
        }
    })
}

function saveThemeChanges() {
    const group = $('#groupName').val();
    const course = $('#groupCourse').val();
    const themeTitle = $('#title').val();
    const themeDescription = $('#description').val()

    $.ajax({
        url: '/panel/api/saveThemeChanges',
        type: 'post',
        data: {
            group: group,
            course: course,
            themeTitle: themeTitle,
            themeDescription: themeDescription,
            lesson: selectedLesson === '' ? $('#targetedLesson').val() : selectedLesson,
            themeId: regexResult[1],
        },
        success: (res) => {
            alertify.success(res['message'] + '. Страница будет перезагруженна через 2 секунды');
            setTimeout(() => {
                window.location.reload()
            }, 2500)
        },
        error: (res) => {
            alertify.error(res.responseJSON['message'])
        }
    })
}

function deleteFile(fileId) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: '/panel/api/deleteFile',
            type: 'post',
            data: {
                fileId: fileId
            },
            success: (res) => {
                alertify.success(res['message']);
                resolve();
            },
            error: (res) => {
                alertify.error(res['message'])
                reject()
            }
        })
    })
}
