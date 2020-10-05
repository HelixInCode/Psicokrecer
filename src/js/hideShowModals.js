const $messageSent = document.getElementById('modal-message-sent')
const $btnHideSent = document.getElementById('close-sent')

const showHideModal = ($btn, $modal) =>{
  $btn.addEventListener('click', () =>{

    $modal.classList.toggle('hide')
  })
}

showHideModal($btnHideSent, $messageSent)