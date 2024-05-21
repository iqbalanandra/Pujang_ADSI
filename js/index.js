document.addEventListener('DOMContentLoaded', function() {
    const signUpLink = document.getElementById('signUpLink');
    const signInLink = document.getElementById('signInLink');
    const signInForm = document.getElementById('signInForm');
    const signUpForm = document.getElementById('signUpForm');
    
  
    signUpLink.addEventListener('click', function(event) {
        event.preventDefault(); 
    
        if (signInForm) {
            signInForm.style.display = 'none';
            delateForgot.style.display = 'none';
        }
        if (signUpForm) {
            signUpForm.style.display = 'block';
        }
    });

    signInLink.addEventListener('click', function(event) {
        event.preventDefault(); 
        if (signUpForm) {
            signUpForm.style.display = 'none';
        }
        if (signInForm) {
            signInForm.style.display = 'block';
            delateForgot.style.display = 'block';
        }
    });
});
