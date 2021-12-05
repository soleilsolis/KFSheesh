document.querySelectorAll(".submit-form").forEach(
	element => element.addEventListener('click', async function(){

		let form = document.getElementById(this.dataset.form);
		let send = this.dataset.send;
		let formData = new FormData(form);

        console.log(send);

		const response = await fetch(send, {
			method: 'POST',
			body: formData
		})
		.then(response => response.json())
		.then(result => {
			if(typeof result.message !== 'undefined'){
				$('#main-error').addClass('error').html(result.message).transition('fade up');
			}

			if(typeof result.errorFields !== 'undefined'){
				result.errorFields.forEach(function(name,index){
					document.querySelector(`[name=${name}]`).classList.add(result.color);
				});
			}
email
			if(typeof result.reload !== 'undefined'){
				if(result.reload)
					location.reload();
			}
		});
	})
);
