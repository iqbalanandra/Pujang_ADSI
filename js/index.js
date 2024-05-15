document.addEventListener('DOMContentLoaded', function() {
    const signUpLink = document.getElementById('signUpLink');
    const signInLink = document.getElementById('signInLink');
    const signInForm = document.getElementById('signInForm');
    const signUpForm = document.getElementById('signUpForm');
    const SubmitButton = document.getElementById('submitButton');
    const acceptEULA = document.getElementById('acceptEULA');
    const delateForgot= document.getElementById('delateForgot');
    
    signUpLink.addEventListener('click', function(event) {
        event.preventDefault(); 
    
        if (signInForm) {
            signInForm.style.display = 'none';
            delateForgot.style.display = 'none';
        }
        if (signUpForm) {
            signUpForm.style.display = 'block';
            SubmitButton.textContent= 'Create Account';
            acceptEULA.textContent= 'acceptEULA';
        }
    });
    signInLink.addEventListener('click', function(event) {
        event.preventDefault(); 
        if (signUpForm) {
            signUpForm.style.display = 'none';
        }
        if (signInForm) {
            signInForm.style.display = 'block';
            SubmitButton.textContent= 'LOGIN';
            acceptEULA.textContent = 'stay signed in';
        }
    });
   });
