const updateData = (link, data, option) => {
  const form = new FormData();
  const container = document.querySelector('.container')
  console.log(data)
  if (option === 'get') 
    fetch(link)
      .then(res => res.text)
      .then(data => {container.innerHTML = data})
  
}

const deleteData = (link) => {
  alert('kk')
  console.log(link)
}

const insertData = function(link) {
  console.log(link)
  const container = document.getElementById('container')
  const form = new FormData();
  form.append('option', false)
  fetch(link, {
    method: 'POST',
    body: form
  }).then(res => res.text())
    .then(data => {
      console.log(data)
      container.innerHTML = data
    })
}