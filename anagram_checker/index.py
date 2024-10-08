def is_anagram(word1, word2):
    word1 = sorted(word1.replace(' ', '').lower())
    word2 = sorted(word2.replace(' ', '').lower())
    return word1 == word2

# Example usage:
word1 = "listen"
word2 = "silent"
if is_anagram(word1, word2):
    print("The words are anagrams.")
else:
    print("The words are not anagrams.")