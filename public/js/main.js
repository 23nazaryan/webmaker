const statusControl = document.querySelector('#status')

if (statusControl) {
    statusControl.addEventListener('change', event => {
        const csrf = document.querySelector('input[name="_token"]').value
        const status = event.target.value
        const task = event.target.getAttribute('data-task-id')

        fetch(`/status?status=${status}&task=${task}`)
            .then(res => res.json())
    })
}
