/**
 * Account Settings - Account
 */

'use strict';

document.addEventListener('DOMContentLoaded', function (e) {
  (function () {

    let accountUserImage = document.getElementById('uploadedAvatar');
    const fileInput = document.querySelector('.account-file-input');


    if (accountUserImage) {
      fileInput.onchange = () => {
        if (fileInput.files[0]) {
          accountUserImage.src = window.URL.createObjectURL(fileInput.files[0]);
        }
      };
    }
  })();
});
