var biblio = { "livres": [] }

stocker()

async function stocker() {
	await fetch("livres.json")
		.then(res => res.json())
		.then(data => data.livres.forEach(livre => {
			biblio.livres.push(livre)
		}))

	biblio.livres.forEach(livre => {
		afficheLivre(livre)
	})
}

function afficherDetail(livre) {
	const details = document.getElementById("details")
	details.innerHTML = ""
	details.style.display = "block"

	const card = document.createElement("div")
	card.classList.add("card")
	card.classList.add("card-body")

	const titre = document.createElement("h4")
	titre.classList.add("my-3")
	titre.textContent = livre.titre

	/*-------------------------------------------------*/

	const p1 = document.createElement("p")
	const indexAuteur = document.createElement("span")
	indexAuteur.classList.add("text-primary")
	indexAuteur.textContent = "Auteur: "

	const auteur = document.createElement("span")
	auteur.textContent = livre.auteurs

	p1.appendChild(indexAuteur)
	p1.appendChild(auteur)

	/*-------------------------------------------------*/

	const p2 = document.createElement("p")
	const indexISBN = document.createElement("span")
	indexISBN.classList.add("text-primary")
	indexISBN.textContent = "ISBN: "

	const isbn = document.createElement("span")
	isbn.textContent = livre.isbn

	p2.appendChild(indexISBN)
	p2.appendChild(isbn)

	/*-------------------------------------------------*/

	const p3 = document.createElement("p")
	const indexEditeur = document.createElement("span")
	indexEditeur.classList.add("text-primary")
	indexEditeur.textContent = "Éditeur: "

	const editeur = document.createElement("span")
	editeur.textContent = livre.editeur

	p3.appendChild(indexEditeur)
	p3.appendChild(editeur)

	/*-------------------------------------------------*/

	const p4 = document.createElement("p")
	const indexDatePublication = document.createElement("span")
	indexDatePublication.classList.add("text-primary")
	indexDatePublication.textContent = "Date de publication: "

	const datePublication = document.createElement("span")
	datePublication.textContent = livre.datePublication

	p4.appendChild(indexDatePublication)
	p4.appendChild(datePublication)

	/*-------------------------------------------------*/

	const p5 = document.createElement("p")
	const indexGenre = document.createElement("span")
	indexGenre.classList.add("text-primary")
	indexGenre.textContent = "Genre: "

	const genre = document.createElement("span")
	genre.textContent = livre.genre

	p5.appendChild(indexGenre)
	p5.appendChild(genre)

	/*-------------------------------------------------*/

	const p6 = document.createElement("p")
	const indexResume = document.createElement("span")
	indexResume.classList.add("text-primary")
	indexResume.textContent = "Résumé: "

	const resume = document.createElement("span")
	resume.textContent = livre.resume

	p6.appendChild(indexResume)
	p6.appendChild(resume)

	/*-------------------------------------------------*/

	const p7 = document.createElement("p")
	const indexLangue = document.createElement("span")
	indexLangue.classList.add("text-primary")
	indexLangue.textContent = "Langue: "

	const langue = document.createElement("span")
	langue.textContent = livre.langue

	p7.appendChild(indexLangue)
	p7.appendChild(langue)

	/*-------------------------------------------------*/

	const p8 = document.createElement("p")
	const indexPages = document.createElement("span")
	indexPages.classList.add("text-primary")
	indexPages.textContent = "Nombres de pages: "

	const pages = document.createElement("span")
	pages.textContent = livre.nombrePages

	p8.appendChild(indexPages)
	p8.appendChild(pages)

	/*-------------------------------------------------*/

	const p9 = document.createElement("p")
	const indexDispo = document.createElement("span")
	indexDispo.classList.add("text-primary")
	indexDispo.textContent = "Disponibilité: "

	const disponibilite = document.createElement("span")
	disponibilite.textContent = livre.disponibilite

	p9.appendChild(indexDispo)
	p9.appendChild(disponibilite)

	/*-------------------------------------------------*/

	const p10 = document.createElement("p")
	const indexEtat = document.createElement("span")
	indexEtat.classList.add("text-primary")
	indexEtat.textContent = "Etat: "

	const etat = document.createElement("span")
	etat.textContent = livre.etat

	p10.appendChild(indexEtat)
	p10.appendChild(etat)

	/*-------------------------------------------------*/

	const p11 = document.createElement("p")
	const indexEmplacement = document.createElement("span")
	indexEmplacement.classList.add("text-primary")
	indexEmplacement.textContent = "Emplacement: "

	const emplacement = document.createElement("span")
	emplacement.textContent = livre.emplacement

	p11.appendChild(indexEmplacement)
	p11.appendChild(emplacement)

	/*-------------------------------------------------*/

	const btn = document.createElement("button")
	btn.classList.add("my-3")
	btn.classList.add("btn")
	btn.classList.add("btn-danger")
	btn.classList.add("col-md-12")
	btn.textContent = "Fermer"
	btn.addEventListener("click", () => {
		details.style.display = "none"
	})

	card.appendChild(titre)
	card.appendChild(p1)
	card.appendChild(p2)
	card.appendChild(p3)
	card.appendChild(p4)
	card.appendChild(p5)
	card.appendChild(p6)
	card.appendChild(p7)
	card.appendChild(p8)
	card.appendChild(p9)
	card.appendChild(p10)
	card.appendChild(p11)
	card.appendChild(btn)

	details.appendChild(card)
}

function afficheLivre(livre) {
	const casier = document.getElementById("casier")

	const container = document.createElement("div")
	container.classList.add("col-md-12")
	container.classList.add("mb-4")

	const card = document.createElement("div")
	card.classList.add("card")

	const row = document.createElement("row")
	row.classList.add("row")

	const imgContainer = document.createElement("div")
	imgContainer.classList.add("col-md-5")

	const img = document.createElement("img")
	img.setAttribute("src", livre.image)
	img.setAttribute("width", "200")
	img.setAttribute("height", "298")

	const infoContainer = document.createElement("div")
	infoContainer.classList.add("col-md-7")

	const cardBody = document.createElement("div")
	cardBody.classList.add("card-body")

	const titre = document.createElement("h5")
	titre.classList.add("card-title")
	titre.textContent = livre.titre

	const auteur = document.createElement("p")
	auteur.classList.add("card-text")
	auteur.textContent = livre.auteurs

	const btn = document.createElement("button")
	btn.classList.add("btn")
	btn.classList.add("btn-warning")
	btn.classList.add("my-4")
	btn.textContent = "Détails"
	btn.addEventListener("click", () => {
		afficherDetail(livre)
	})

	imgContainer.appendChild(img)
	cardBody.appendChild(titre)
	cardBody.appendChild(auteur)
	cardBody.appendChild(btn)
	infoContainer.appendChild(cardBody)
	row.appendChild(imgContainer)
	row.appendChild(infoContainer)
	card.appendChild(row)
	container.appendChild(card)
	casier.appendChild(container)
}