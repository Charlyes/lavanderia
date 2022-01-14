function getJson(form,el,location) {
    if (el) {
        var html=el.innerHTML;
        el.innerHTML='Carregando...';
        el.disabled=true;
    }
    $.ajax({
        dataType: "json",
        url: root+'api/',
        type: "POST",
        data: $(form).serialize(),
        success: function (e) {
            if (el) {
                el.innerHTML=html;
                el.disabled=false;
            }
            if (e.status === 'error') {
                alert(e.message);
            } else if (e.status === 'success') {
                window.location=location;
            }
        }
    });
}