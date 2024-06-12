# BE_Assesment_Interview

Personal Info
Name: GOO ZHEN JIE
Gender: Male
Phone number: 011-18803778
Preferred Language: Chinese, English
Working Experience: 1 year
Explanation
You can use any tool to complete these questions. You should consider the case of different inputs, not question inputs for each question, we expect different scenarios to be handled, and the function will still work accordingly.
 
Allows the use of search engines and reference books for code reference and syntax.
However, you cannot search for instant solutions to your problems. You will be disqualified if do so.

Submission:
- Must submit your code into either (Github/ Gitlab/ Send through whatsapp).
- Provide a link to your repo/ drive
Question 1 
Jack operates a photo-sharing website where users can upload and download images. 

Non-members are restricted from downloading images if they have downloaded another image within the past 5 seconds.

In contrast, members are allowed to download two images consecutively without any waiting period. However, for their third download and beyond, they must wait 5 seconds since their last download, similar to non-members.
 
Write a function:
checkDownload($memberType)
The function accepts member type as input and returns the response depending on the aforementioned rules.
 
If the user tries to download again within the 5-second wait time, it should return a message "Too many downloads".
 
The waiting time validation should happen in the backend/frontend. (backend is preferred)

Expected outcomes:
Non-members:
00:00:00 execute checkDownload(‘nonmember’) returns "Your download is starting..."
00:00:03 execute checkDownload(‘nonmember’) returns "Too many downloads"
 

Members:
00:00:00 execute checkDownload(‘member’) returns "Your download is starting..."
00:00:03 execute checkDownload(‘member) returns "Your download is starting..."
00:00:05 execute checkDownload(‘member) returns "Too many downloads"
 
Your Answer:






Question 2
Kiki and Sam, who are good friends working in the catering industry, plan to implement a discount promotion in their POS system. The promotion offers a 10% discount for purchases over 500, a 5% discount for purchases under 500, but no discount for purchases below 100.
 
Write a function: 
checkDiscount($purchaseValue)
The function takes $purchaseValue and checks to determine the amount of the discount offer.

Expected outcomes:
checkDiscount(300)
Purchase Value is 300 , discount is 5%
checkDiscount(80)
Purchase Value is 80 , there are no discount.
 
Your Answer:





Question 3
Write a function:
How Can We Know The Number Of Days Between Two Given Dates Using PHP? Is The Day Odd Or Even. (This question can be played in any form freely)

Your Answer:



Question 4
Ong, a game developer, has released a gacha game on the App Store where players can use in-game currency to obtain random equipment items for their characters.

Recently, he introduced a VIP reward system, incentivizing players to spend real money in the game. This system is tiered: the more a player spends, the higher their VIP level becomes.

To enhance the benefits for VIP players, Ong is now looking to increase their chances of acquiring higher-tier items. He seeks assistance in developing a feature that would proportionally improve the likelihood of higher-tier VIPs receiving items of greater rarity.
 
Given that:
item_tier_rarity = [1,2,3,4,5] // 1 = common , 5 = legend
vip_rank = [v1,v2,v3,v4,v5] //v1 = lowest rank
 
Write functions:
1.  Function roll_item(vip_rank) to generate random item.
2.  A function that loops the roll_item() 100 times foreach vip_ranks, and print the item distribution result.
3.  Sample results:
 
Expected Outcomes:
vip1 player have higher chance to get an item in [1,2] rarity
vip2 player have higher chance to get an item in [1,2,3] rarity
vip3 player have higher chance to get an item in [1,2,3,4] rarity
  
Please note that:
1.  Ong may add more items to item_rarity[]. exp [6, 7, 8]
2.  Ong may add more level to vip_ranks[]. exp [vip4, vip5]
3.  allow to make additional assumptions
4.  Avoid any hardcoded logic that may disallow new entry into item_rarity and vip_rank

Your Answer:
