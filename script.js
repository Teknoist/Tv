const videoPlayer = document.getElementById('videoPlayer');
const channelSelector = document.getElementById('channelSelector');
const selectedLogo = document.getElementById('selectedLogo');
const toggleMode = document.getElementById('toggleMode');

let darkMode = false;

// Karanlık / Aydınlık mod geçişi
toggleMode.addEventListener('click', () => {
    darkMode = !darkMode;
    document.body.classList.toggle('dark-mode', darkMode);
    toggleMode.querySelector('span').textContent = darkMode ? 'light_mode' : 'dark_mode';

    // Logo ve düğme renklerini güncelle
    const logoImage = selectedLogo.querySelector('img');
    if (logoImage) {
        logoImage.style.borderColor = darkMode ? '#ffc107' : '#007bff';
    }
    toggleMode.style.color = darkMode ? '#fff' : '#343a40'; // Düğme metninin rengi
});

function loadChannels() {
    fetch('https://raw.githubusercontent.com/hayatiptv/iptv/master/index.m3u') // URL'den dosyayı yükle
        .then(response => response.text())
        .then(data => {
            const lines = data.split('\n');
            let channels = [];

            for (let i = 0; i < lines.length; i++) {
                if (lines[i].startsWith('#EXTINF:')) {
                    const channelInfo = lines[i].split(',');
                    const channelName = channelInfo[1].trim();
                    const logoMatch = lines[i].match(/tvg-logo="([^"]+)"/); // Logo URL
                    const logoUrl = logoMatch ? logoMatch[1].replace('http://', 'https://') : ''; // HTTP'yi HTTPS'ye çevir
                    const channelUrl = lines[i + 1].trim().replace('http://', 'https://'); // HTTP'yi HTTPS'ye çevir
                    channels.push({ name: channelName, logo: logoUrl, url: channelUrl });
                }
            }

            channels.forEach(channel => {
                const option = document.createElement('option');
                option.value = channel.url;
                option.textContent = channel.name;
                option.dataset.logo = channel.logo; // Logo URL'yu veri özniteliği olarak saklayın
                channelSelector.appendChild(option);
            });
        })
        .catch(error => console.error('Hata:', error));
}

// Kanalı yükle
function loadChannel() {
    const selectedOption = channelSelector.options[channelSelector.selectedIndex];
    const channelUrl = selectedOption.value;
    const logoUrl = selectedOption.dataset.logo;

    if (Hls.isSupported() && channelUrl) {
        const hls = new Hls();
        hls.loadSource(channelUrl);
        hls.attachMedia(videoPlayer);
        videoPlayer.play();
        displayLogo(logoUrl);
    }
}

// Logoyu göster
function displayLogo(logoUrl) {
    selectedLogo.innerHTML = `<img src="${logoUrl}" alt="Kanal Logosu" style="border: 2px solid;">`;
    selectedLogo.style.opacity = 1; // Logoyu göster
}

// Kanal seçildiğinde yükleme
channelSelector.addEventListener('change', loadChannel);

// Başlangıçta kanalları yükle
loadChannels();
