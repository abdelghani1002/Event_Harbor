let status_selects = Array.from(document.querySelectorAll(".status_select"));

status_selects.forEach(select =>{
    select.addEventListener("change", () => {
    let status_form = select.parentElement;
    status_form.submit();
    })
})
