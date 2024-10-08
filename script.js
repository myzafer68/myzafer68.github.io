function performSearch() {
    // Arama sorgusu
    let query = document.getElementById('searchQuery').value;

    // Seçilen dosya türü
    let fileType = document.querySelector('input[name="fileType"]:checked')?.value || "";

    // Seçilen arama noktası
    let searchPoint = document.querySelector('input[name="searchPoint"]:checked')?.value || "";

    // Google Dork oluşturma
    let dork = `intitle:"${query}"`;
    if (fileType) {
        dork += ` filetype:${fileType}`;
    }
    if (searchPoint && searchPoint !== "article" && searchPoint !== "book") {
        dork += ` site:${searchPoint}`;
    } else if (searchPoint === "article") {
        dork += ` inurl:article`;
    } else if (searchPoint === "book") {
        dork += ` inurl:book`;
    }

    // Google'da arama yap
    window.open(`https://www.google.com/search?q=${encodeURIComponent(dork)}`);

    // Formu sıfırlama
    document.getElementById('searchQuery').value = "";
    document.querySelectorAll('input[type="radio"]').forEach(input => input.checked = false);
}

function redirectVirusTotal() {
    // VirusTotal sitesine yönlendirme
    window.open("https://www.virustotal.com/");
}
