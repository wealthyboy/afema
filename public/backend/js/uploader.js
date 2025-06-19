function handleFiles(input, name) {
  [...input.files].forEach(file => uploadSingleFile(file, input, name));
}

// ▸ extracted single‑file uploader (was the body of getFile)
function uploadSingleFile(oneFile, inputEl, name) {

  // ----- 1.  same DOM prep you had -----
  const parent   = inputEl.parentNode;
  const fileErr  = parent.querySelector('#img-error');
  if (fileErr) fileErr.remove();

  parent.querySelector('.upload-text').classList.add('hide');
  const target  = parent.querySelector('#j-details');

  // loading placeholder
  const holder  = document.createElement('div');
  holder.className = 'j-complete j-loading';
  holder.innerHTML = '<div class="j-preview loading"></div>';
  target.appendChild(holder);

  // ----- 2.  upload -----
  const form = new FormData();
  form.append('file', oneFile);

  $.ajax({
    url: '/admin/upload/image?folder=events',
    type: 'POST',
    data: form,
    cache: false,
    contentType: false,
    processData: false,
    success: data => {
      if (data.path) {
        const rand  = Math.floor(Math.random()*1e9)+1;
        const html  = `
          <div id="${rand}" class="j-complete">
            <div class="j-preview j-no-multiple">
              <img class="img-thumnail" src="${data.path}">
              <div id="remove_image" class="remove_image remove-image">
                <a class="remove-image" data-randid="${rand}" data-url="${data.path}" href="#">Remove</a>
              </div>
              <input type="hidden" class="stored_image_url" name="${name}" value="${data.path}">
            </div>
          </div>`;
        holder.remove();               // remove loading
        target.insertAdjacentHTML('beforeend', html);
      }
    },
    error: () => holder.remove()
  });
}