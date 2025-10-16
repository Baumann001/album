!async function main() {
    "use strict";

    const dom = {
        lyric: document.querySelector(".lyric"),
        player: document.querySelector(".player")
    };

    // load lrc file
    const res = await fetch("./lyric.lrc");
    const lrc = await res.text();

    const lyrics = parseLyric(lrc);

    // Note: Replace "./audio.mp3" with the actual audio file path or YouTube embed
    // For YouTube, you might need to use an embed or download the audio
    dom.player.src = "./audio.mp3";

    dom.player.ontimeupdate = () => {
        const time = dom.player.currentTime;
        const index = syncLyric(lyrics, time);

        if (index == null) return;

        dom.lyric.innerHTML = lyrics[index].text;
    };

}();

function parseLyric(lrc) {
    const lines = lrc.split('\n');
    const lyrics = [];
    const timeRegex = /\[(\d{2}):(\d{2})\.(\d{2})\]/;

    for (const line of lines) {
        const match = line.match(timeRegex);
        if (match) {
            const minutes = parseInt(match[1], 10);
            const seconds = parseInt(match[2], 10);
            const centiseconds = parseInt(match[3], 10);
            const time = minutes * 60 + seconds + centiseconds / 100;
            const text = line.replace(timeRegex, '').trim();
            lyrics.push({ time, text });
        }
    }

    return lyrics;
}

function syncLyric(lyrics, time) {
    for (let i = lyrics.length - 1; i >= 0; i--) {
        if (time >= lyrics[i].time) {
            return i;
        }
    }
    return null;
}
