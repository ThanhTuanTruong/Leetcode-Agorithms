<?php
//Ranking of poker hands: https://cdn-bpfni.nitrocdn.com/ATMRaIwpoDqKcTxjvUInsOfGfTdpynOR/assets/images/optimized/rev-af82d68/upswingpoker.com/wp-content/uploads/2018/11/Hand-Rankings-Upswing-Poker.jpg 

//Requirements: 
	//Receive information of 2 poker hands (A & B). Return the winner hand.
	//You can actively define input data (from csv, excel, db ...), data structure (class, struct, enum, string ...), algorithms (on matrix, gragh, recursive ...), output (console, write to file, UI ...) based on your assumptions.
	//Focus on main concept, dont need to details implementation for all steps/functions ....



// Define a function to evaluate the rank of a poker hand
function evaluateHandRank($hand)
{
    // Implement the logic to evaluate the rank of a poker hand
    // Check for different hand combinations and assign a rank accordingly
    // Return the rank of the hand (e.g., 1 for high card, 2 for one pair, etc.)
    $cards = explode(",", $hand);


    // Count the number of occurrences of each rank and suit in the hand
    $rankCounts = array();
    $suitCounts = array();

    foreach ($cards as $card) {
        $rank = substr($card, 0, -1);
        $suit = substr($card, -1);
        

        if (!isset($rankCounts[$rank])) {
            $rankCounts[$rank] = 1;
        } else {
            $rankCounts[$rank]++;
        }

        if (!isset($suitCounts[$suit])) {
            $suitCounts[$suit] = 1;
        } else {
            $suitCounts[$suit]++;
        }
    }

    // Check for different hand combinations and assign a rank accordingly
    // Start with the highest ranking hands and move to lower ranking hands

    // Check for straight flush (rank 9)
    if (hasStraight($cards) && hasFlush($cards)) {
        return 9;
    }

    // Check for four of a kind (rank 8)
if (max($rankCounts) == 4) {
        return 8;
    }

    // Check for full house (rank 7)
    if (max($rankCounts) == 3 && count($rankCounts) == 2) {
        return 7;
    }

    // Check for flush (rank 6)
    if (hasFlush($cards)) {
        return 6;
    }

    // Check for straight (rank 5)
    if (hasStraight($cards)) {
        return 5;
    }

    // Check for three of a kind (rank 4)
    if (max($rankCounts) == 3) {
        return 4;
    }

    // Check for two pairs (rank 3)
    if (count(array_keys($rankCounts, 2)) == 2) {
        return 3;
    }

    // Check for one pair (rank 2)
    if (max($rankCounts) == 2) {
        return 2;
    }

    // High card (rank 1)
    return 1;
}

function hasStraight($cards)
{
    $ranks = array();

    foreach ($cards as $card) {
        $rank = substr($card, 0, -1);
        $ranks[] = getRankValue($rank);
    }

    sort($ranks);

    // Check for the special case of Ace, 2, 3, 4, 5
    if ($ranks == [2, 3, 4, 5, 14]) {
        return true;
    }

    // Check for a normal straight
    for ($i = 0; $i < count($ranks) - 1; $i++) {
        if ($ranks[$i + 1] - $ranks[$i] != 1) {
            return false;
        }
    }

    return true;
}

// Function to check if the hand has a flush
function hasFlush($cards)
{
    $suits = array();

    foreach ($cards as $card) {
        $suit = substr($card, -1);
        $suits[] = $suit;
    }

    return count(array_unique($suits)) == 1;
}

// Function to get the numerical value of a rank
function getRankValue($rank)
{
    switch ($rank) {
        case 'A':
            return 14;
        case 'K':
            return 13;
        case 'Q':
            return 12;
        case 'J':
            return 11;
        default:
            return intval($rank);
    }
}

// Function to determine the winner between two poker hands
function determineWinner($handA, $handB)
{
    $rankA = evaluateHandRank($handA);
    $rankB = evaluateHandRank($handB);

    if ($rankA > $rankB) {
        return "Hand A wins!";
    } elseif ($rankA < $rankB) {
        return "Hand B wins!";
    } else {
        return "It's a tie!";
    }
}

// Example usage
$handA = "AH,KD,QS,JC,10S";  // Example hand A: Ace of Hearts, King of Diamonds, Queen of Spades, Jack of Clubs, 10 of Spades
$handB = "AS,KS,QS,JS,10S";  // Example hand B: Ace of Spades, King of Spades, Queen of Spades, Jack of Spades, 10 of Spades

$result = determineWinner($handA, $handB);
echo $result;

?>