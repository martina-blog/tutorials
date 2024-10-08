function isAnagram(word1, word2) {
	word1 = word1.replace(/ /g, '').toLowerCase();
	word2 = word2.replace(/ /g, '').toLowerCase();

	if (word1.length !== word2.length) {
		return false;
	}

	const charCount = {};

	for (let i = 0; i < word1.length; i++) {
		const char = word1[i];
		charCount[char] = (charCount[char] || 0) + 1;
	}

	for (let i = 0; i < word2.length; i++) {
		const char = word2[i];
		if (!charCount[char]) {
			return false;
		}
		charCount[char]--;
	}

	return true;
}

// Example usage:
const word1 = "listen";
const word2 = "silent";
if (isAnagram(word1, word2)) {
	console.log("The words are anagrams.");
} else {
	console.log("The words are not anagrams.");
}