<html>
<head></head>
	<script>
	document.addEventListener("DOMContentLoaded", ()=>{
		let val = document.getElementById("val")
		let render_time = document.getElementById("timea")
		let btnset = document.getElementById("btnset")


		const render = () => {
			const check = getWithExpiry('st_al')	
			if(!check){
				val.innerHTML = 'Die'
			}else {
				val.innerHTML = 'Alive'	
			}
		}


		btnset.addEventListener("click", () =>{
			//setWithExpiry("st_al", "edd7dcb4-ddd4-11e...",1440 * 1000)
				setInterval(()=>{
					let time = new Date()
					render_time.innerHTML = time
					render()	
				},500)
		})

	})
	</script>
<body>
	<div id="check">
		Check LocalStorage : <label id="val"></label> 
		<br>
		Time : <label id="timea"></label>
	</div>
	<button id="btnset">SET</button>
</body>
</html>
