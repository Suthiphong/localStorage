<html>
<head></head>
	<script>
	document.addEventListener("DOMContentLoaded", ()=>{
		let val = document.getElementById("val")
		let render_time = document.getElementById("timea")
		let btnset = document.getElementById("btnset")

		class sessionLocalStorage {
		  key = 'sessi_ex_ti'

		  setWithExpiry(ttl) {
			  const now = new Date()
			  const item = {
				value: `0242ac130003${now.getTime()}ddd4-11ea`,
				expiry: now.getTime() + ttl
			  }
			  localStorage.setItem(this.key, JSON.stringify(item))
		  }

		  getWithExpiry() {
			  const itemStr = localStorage.getItem(this.key)
			  if(!itemStr){
				return null
			  }
			  const item = JSON.parse(itemStr)
			  const now = new Date()

			  if(now.getTime() > item.expiry){
				localStorage.removeItem(this.key)
				return null
			  }

			  return item.value
		  }

		}

		const render = () => {
			const check = sess.getWithExpiry('st_al')	
			if(!check){
				val.innerHTML = 'Die'
			}else {
				val.innerHTML = 'Alive'	
			}
		}


		btnset.addEventListener("click", () =>{
			//setWithExpiry("st_al", "edd7dcb4-ddd4-11e...",1440 * 1000)
				sess.setWithExpiry(5000)
				setInterval(()=>{
					let time = new Date()
					render_time.innerHTML = time
					render()	
				},500)
		})
		var sess = new sessionLocalStorage()

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
