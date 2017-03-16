<?php

return [

   'Introduction' => [
      0 => "\"Bitcoin\" has been a successful implementation of the concept of p2p electronic cash. Both professionals and the general public have come to appreciate the convenient combination of public transactions and proof-of-work as a trust model. Today, the user base of electronic cash is growing at a steady pace; customers are attracted to low fees and the anonymity provided by electronic cash and merchants value its predicted and decentralized emission. Bitcoin has effectively proved that electronic cash can be as simple as paper money and as convenient as credit cards.",
      1 => "Unfortunately, Bitcoin suffers from several deficiencies. For example, the system's distributed nature is inflexible, preventing the implementation of new features until almost all of the network users update their clients. Some critical flaws that cannot be fixed rapidly deter Bitcoin's widespread propagation. In such inflexible models, it is more efficient to roll-out a new project rather than perpetually fix the original project.",
      2 => "In this paper, we study and propose solutions to the main deficiencies of Bitcoin. We believe that a system taking into account the solutions we propose will lead to a healthy competition among different electronic cash systems. We also propose our own electronic cash, \"_PROTOCOL_\", a name emphasizing the next breakthrough in electronic cash.",
   ],

   'Traceability of Transactions' => [
      0 => "Privacy and anonymity are the most important aspects of electronic cash. Peer-to-peer payments seek to be concealed from third party's view, a distinct difference when compared with traditional banking. In particular, T. Okamoto and K. Ohta described six criteria of ideal electronic cash, which included \"privacy: relationship between the user and his purchases must be untraceable by anyone.\" From their description, we derived two properties which a fully anonymous electronic cash model must satisfy in order to comply with the requirements outlined by Okamoto and Ohta:",
      1 => [
         'code' => "Untraceability: for each incoming transaction all possible senders are equiprobable.",
      ],
      2 => [
         'code' => "Unlinkability: for any two outgoing transactions it is impossible to prove they were sent to the same person.",
      ],
      3 => "Unfortunately, Bitcoin does not satisfy the untraceability requirement. Since all the transactions that take place between the network's participants are public, any transaction can be unambiguously traced to a unique origin and final recipient. Even if two participants exchange funds in an indirect way, a properly engineered path-finding method will reveal the origin and final recipient.",
      4 => "It is also suspected that Bitcoin does not satisfy the second property. Some researchers stated that a careful blockchain analysis may reveal a connection between the users of the Bitcoin network and their transactions. Although a number of methods are disputed, it is suspected that a lot of hidden personal information can be extracted from the public database.",
      5 => "Bitcoin's failure to satisfy the two properties outlined above leads us to conclude that it is not an anonymous but a pseudo-anonymous electronic cash system. Users were quick to develop solutions to circumvent this shortcoming. Two direct solutions were \"laundering services\" and the development of distributed methods. Both solutions are based on the idea of mixing several public transactions and sending them through some intermediary address; which in turn suffers the drawback of requiring a trusted third party.",
      6 => "Recently, a more creative scheme was proposed by I. Miers et al.: \"Zerocoin\". Zerocoin utilizes a cryptographic one-way accumulators and zero-knoweldge proofs which permit users to \"convert\" bitcoins to zerocoins and spend them using anonymous proof of ownership instead of explicit public-key based digital signatures. However, such knowledge proofs have a constant but inconvenient size - about 30kb (based on today's Bitcoin limits), which makes the proposal impractical. Authors admit that the protocol is unlikely to ever be accepted by the majority of Bitcoin users.",
   ],

   'Proof-of-Work' => [
      0 => "Bitcoin creator Satoshi Nakamoto described the majority decision making algorithm as \"one-CPU-one-vote\" and used a CPU-bound pricing function (double SHA-256) for his proof-of-work scheme. Since users vote for the single history of transactions order, the reasonableness and consistency of this process are critical conditions for the whole system.",
      1 => "The security of this model suffers from two drawbacks. First, it requires 51% of the network's mining power to be under the control of honest users. Secondly, the system's progress (bug fixes, security fixes, etc...) require the overwhelming majority of users to support and agree to the changes (this occurs when the users update their wallet software).Finally this same voting mechanism is also used for collective polls about implementation of some features.",
      2 => "This permits us to conjecture the properties that must be satisfied by the proof-of-work pricing function. Such function must not enable a network participant to have a significant advantage over another participant; it requires a parity between common hardware and high cost of custom devices. From recent examples, we can see that the SHA-256 function used in the Bitcoin architecture does not posses this property as mining becomes more efficient on GPUs and ASIC devices when compared to high-end CPUs.",
      3 => "Therefore, Bitcoin creates favourable conditions for a large gap between the voting power of participants as it violates the \"one-CPU-one-vote\" principle since GPU and ASIC owners posses a much larger voting power when compared with CPU owners. It is a classical example of the Pareto principle where 20% of a system's participants control more than 80% of the votes.",
      4 => "One could argue that such inequality is not relevant to the network's security since it is not the small number of participants controlling the majority of the votes but the honesty of these participants that matters. However, such argument is somewhat flawed since it is rather the possibility of cheap specialized hardware appearing rather than the participants' honesty which poses a threat. To demonstrate this, let us take the following example. Suppose a malevolent individual gains significant mining power by creating his own mining farm through the cheap hardware described previously. Suppose that the global hashrate decreases significantly, even for a moment, he can now use his mining power to fork the chain and double-spend. As we shall see later in this article, it is not unlikely for the previously described event to take place.",
   ],

   'Irregular emission' => [
      0 => "Bitcoin has a predetermined emission rate: each solved block produces a fixed amount of coins. Approximately every four years this reward is halved. The original intention was to create a limited smooth emission with exponential decay, but in fact we have a piecewise linear emission function whose breakpoints may cause problems to the Bitcoin infrastructure.",
      1 => "When the breakpoint occurs, miners start to receive only half of the value of their previous reward. The absolute difference between 12.5 and 6.25 BTC (projected for the year 2020) may seem tolerable. However, when examining the 50 to 25 BTC drop that took place on November 28 2012, felt inappropriate for a significant number of members of the mining community. Figure 1 shows a dramatic decrease in the network's hashrate in the end of November, exactly when the halving took place. This event could have been the perfect moment for the malevolent individual described in the proof-of-work function section to carry-out a double spending attack.",
      2 => [
         'img' => "/img/cryptonote/001.png",
      ],
   ],

   'Hardcoded constants' => [
      0 => "Bitcoin has many hard-coded limits, where some are natural elements of the original design (e.g. block frequency, maximum amount of money supply, number of confirmations) whereas other seem to be artificial constraints. It is not so much the limits, as the inability of quickly changing them if necessary that causes the main drawbacks. Unfortunately, it is hard to predict when the constants may need to be changed and replacing them may lead to terrible consequences.",
      1 => "A good example of a hardcoded limit change leading to disastrous consequences is the block size limit set to 250kb1. This limit was sufficient to hold about 10000 standard transactions. In early 2013, this limit had almost been reached and an agreement was reached to increase the limit. The change was implemented in wallet version 0.8 and ended with a 24-blocks chain split and a successful double-spend attack. While the bug was not in the Bitcoin protocol, but rather in the database engine it could have been easily caught by a simple stress test if there was no artificially introduced block size limit.",
      2 => "Constants also act as a form of centralization point. Despite the peer-to-peer nature of Bitcoin, an overwhelming majority of nodes use the official reference client developed by a small group of people. This group makes the decision to implement changes to the protocol and most people accept these changes irrespective of their \"correctness\". Some decisions caused heated discussions and even calls for boycott, which indicates that the community and the developers may disagree on some important points. It therefore seems logical to have a protocol with user-configurable and self-adjusting variables as a possible way to avoid these problems.",
   ],

   'Bulky scripts' => [
      0 => "The scripting system in Bitcoin is a heavy and complex feature. It potentially allows one to create sophisticated transactions, but some of its features are disabled due to security concerns and some have never even been used. The script (including both senders' and receivers' parts) for the most popular transaction in Bitcoin looks like this:",
      1 => [
         'code' => "<sig> <pubKey> OP DUP OP HASH160 <pubKeyHash> OP EQUALVERIFY OP CHECKSIG.",
      ],
      2 => "The script is 164 bytes long whereas its only purpose is to check if the receiver possess the secret key required to verify his signature.",
   ],

   'The _PROTOCOL_ Technology' => [
      0 => "Now that we have covered the limitations of the Bitcoin technology, we will concentrate on presenting the features of _PROTOCOL_.",
   ],

   'Untraceable Transactions' => [
      0 => "In this section we propose a scheme of fully anonymous transactions satisfying both untraceability and unlinkability conditions. An important feature of our solution is its autonomy: the sender is not required to cooperate with other users or a trusted third party to make his transactions; hence each participant produces a cover traffic independently.",
   ],

   'Literature review' => [
      0 => "Our scheme relies on the cryptographic primitive called a group signature. First presented by D. Chaum and E. van Heyst, it allows a user to sign his message on behalf of the group. After signing the message the user provides (for verification purposes) not his own single public key, but the keys of all the users of his group. A verifier is convinced that the real signer is a member of the group, but cannot exclusively identify the signer.",
      1 => "The original protocol required a trusted third party (called the Group Manager), and he was the only one who could trace the signer. The next version called a ring signature, introduced by Rivest et al. in, was an autonomous scheme without Group Manager and anonymity revocation. Various modifications of this scheme appeared later: linkable ring signature allowed to determine if two signatures were produced by the same group member, traceable ring signature limited excessive anonymity by providing possibility to trace the signer of two messages with respect to the same metainformation (or \"tag\").",
      2 => "A similar cryptographic construction is also known as a ad-hoc group signature. It emphasizes the arbitrary group formation, whereas group/ring signature schemes rather imply a fixed set of members.",
      3 => "For the most part, our solution is based on the work \"Traceable ring signature\" by E. Fujisaki and K. Suzuki. In order to distinguish the original algorithm and our modification we will call the latter a one-time ring signature, stressing the user's capability to produce only one valid signature under his private key. We weakened the traceability property and kept the linkability only to provide one-timeness: the public key may appear in many foreign verifying sets and the private key can be used for generating a unique anonymous signature. In case of a double spend attempt these two signatures will be linked together, but revealing the signer is not necessary for our purposes.",
   ],

   'Elliptic curve parameters' => [
      0 => "As our base signature algorithm we chose to use the fast scheme EdDSA, which is developed and implemented by D.J. Bernstein et al. Like Bitcoin's ECDSA it is based on the elliptic curve discrete logarithm problem, so our scheme could also be applied to Bitcoin in future.  Common parameters are:",
      1 => [
         'img' => "/img/cryptonote/002.png",
      ],
   ],

   'Terminology' => [
      0 => "Enhanced privacy requires a new terminology which should not be confused with Bitcoin entities.",
      1 => [
         'img' => "/img/cryptonote/003.png",
      ],
      2 => [
         'img' => "/img/cryptonote/004.png",
      ],
      3 => "The transaction structure remains similar to the structure in Bitcoin: every user can choose several independent incoming payments (transactions outputs), sign them with the corresponding private keys and send them to different destinations.",
      4 => "Contrary to Bitcoin's model, where a user possesses unique private and public key, in the proposed model a sender generates a one-time public key based on the recipient's address and some random data. In this sense, an incoming transaction for the same recipient is sent to a one-time public key (not directly to a unique address) and only the recipient can recover the corresponding private part to redeem his funds (using his unique private key). The recipient can spend the funds using a ring signature, keeping his ownership and actual spending anonymous. The details of the protocol are explained in the next subsections.",
      5 => "",
      6 => "",
   ],

   'Unlinkable payments' => [
      0 => "Classic Bitcoin addresses, once being published, become unambiguous identifier for incoming payments, linking them together and tying to the recipient's pseudonyms. If someone wants to receive an \"untied\" transaction, he should convey his address to the sender by a private channel. If he wants to receive different transactions which cannot be proven to belong to the same owner he should generate all the different addresses and never publish them in his own pseudonym.",
      1 => [
         'img' => "/img/cryptonote/005.png",
      ],
      2 => "We propose a solution allowing a user to publish a single address and receive unconditional unlinkable payments. The destination of each _PROTOCOL_ output (by default) is a public key, derived from recipient's address and sender's random data. The main advantage against Bitcoin is that every destination key is unique by default (unless the sender uses the same data for each of his transactions to the same recipient). Hence, there is no such issue as \"address reuse\" by design and no observer can determine if any transactions were sent to a specific address or link two addresses together.",
      3 => [
         'img' => "/img/cryptonote/006.png",
      ],
      4 => "First, the sender performs a Diffie-Hellman exchange to get a shared secret from his data and half of the recipient's address. Then he computes a one-time destination key, using the shared secret and the second half of the address. Two different ec-keys are required from the recipient for these two steps, so a standard _PROTOCOL_ address is nearly twice as large as a Bitcoin wallet address. The receiver also performs a Diffie-Hellman exchange to recover the corresponding secret key.",
      5 => "A standard transaction sequence goes as follows:",
      6 => [
         'img' => "/img/cryptonote/007.png",
      ],
      7 => [
         'img' => "/img/cryptonote/008.png",
      ],
      8 => "As a result Bob gets incoming payments, associated with one-time public keys which are unlinkable for a spectator. Some additional notes:",
      9 => [
         'code' => "When Bob \"recognizes\" his transactions (see step 5) he practically uses only half of his private information: (a,B). This pair, also known as the tracking key, can be passed to a third party (Carol). Bob can delegate her the processing of new transactions. Bob doesn't need to explicitly trust Carol, because she can't recover the one-time secret key p without Bob's full private key (a, b). This approach is useful when Bob lacks bandwidth or computation power (smartphones, hardware wallets etc.).",
      ],
      10 => [
         'code' => "In case Alice wants to prove she sent a transaction to Bob's address she can either disclose r or use any kind of zero-knowledge protocol to prove she knows r (for example by signing the transaction with r).",
      ],
      11 => [
         'code' => "If Bob wants to have an audit compatible address where all incoming transaction are linkable, he can either publish his tracking key or use a truncated address. That address represent only one public ec-key B, and the remaining part required by the protocol is derived from it as follows: a = Hs(B) and A = Hs(B)G. In both cases every person is able to \"recognize\" all of Bob's incoming transaction, but, of course, none can spend the funds enclosed within them without the secret key b.",
      ],
   ],

   'One-time ring signatures' => [
      0 => "A protocol based on one-time ring signatures allows users to achieve unconditional unlinkability. Unfortunately, ordinary types of cryptographic signatures permit to trace transactions to their respective senders and receivers. Our solution to this deficiency lies in using a different signature type than those currently used in electronic cash systems.",
      1 => "We will first provide a general description of our algorithm with no explicit reference to electronic cash.",
      2 => "A one-time ring signature contains four algorithms: (GEN, SIG, VER, LNK):",
      3 => [
         'img' => "/img/cryptonote/009.png",
      ],
      4 => [
         'img' => "/img/cryptonote/010.png",
      ],
      5 => "The idea behind the protocol is fairly simple: a user produces a signature which can be checked by a set of public keys rather than a unique public key. The identity of the signer is indistinguishable from the other users whose public keys are in the set until the owner produces a second signature using the same keypair.",
      6 => [
         'img' => "/img/cryptonote/011.png",
      ],
      7 => [
         'img' => "/img/cryptonote/012.png",
      ],
   ],

   'Standard _PROTOCOL_ transaction' => [
      0 => "By combining both methods (unlinkable public keys and untraceable ring signature) Bob achieves new level of privacy in comparison with the original Bitcoin scheme. It requires him to store only one private key (a, b) and publish (A, B) to start receiving and sending anonymous transactions.",
      1 => "While validating each transaction Bob additionally performs only two elliptic curve multiplications and one addition per output to check if a transaction belongs to him. For his every output Bob recovers a one-time keypair (pi,Pi) and stores it in his wallet. Any inputs can be circumstantially proved to have the same owner only if they appear in a single transaction. In fact this relationship is much harder to establish due to the one-time ring signature.",
      2 => "With a ring signature Bob can effectively hide every input among somebody else's; all possible spenders will be equiprobable, even the previous owner (Alice) has no more information than any observer.",
      3 => "When signing his transaction Bob specifies n foreign outputs with the same amount as his output, mixing all of them without the participation of other users. Bob himself (as well as anybody else) does not know if any of these payments have been spent: an output can be used in thousands of signatures as an ambiguity factor and never as a target of hiding. The double spend check occurs in the LNK phase when checking against the used key images set.",
      4 => "Bob can choose the ambiguity degree on his own: n = 1 means that the probability he has spent the output is 50% probability, n = 99 gives 1%. The size of the resulting signature increases linearly as O(n + 1), so the improved anonymity costs to Bob extra transaction fees. He also can set n = 0 and make his ring signature to consist of only one element, however this will instantly reveal him as a spender.",
      5 => [
         'img' => "/img/cryptonote/013.png",
      ],
   ],

   'Egalitarian Proof-of-work' => [
      0 => "In this section we propose and ground the new proof-of-work algorithm. Our primary goal is to close the gap between CPU (majority) and GPU/FPGA/ASIC (minority) miners. It is appropriate that some users can have a certain advantage over others, but their investments should grow at least linearly with the power. More generally, producing special-purpose devices has to be as less profitable as possible.",
   ],

   'Related works' => [
      0 => "The original Bitcoin proof-of-work protocol uses the CPU-intensive pricing function SHA-256. It mainly consists of basic logical operators and relies solely on the computational speed of processor, therefore is perfectly suitable for multicore/conveyer implementation.",
      1 => "However, modern computers are not limited by the number of operations per second alone, but also by memory size. While some processors can be substantially faster than others, memory sizes are less likely to vary between machines.",
      2 => "Memory-bound price functions were first introduced by Abadi et al and were defined as \"functions whose computation time is dominated by the time spent accessing memory.\" The main idea is to construct an algorithm allocating a large block of data (\"scratchpad\") within memory that can be accessed relatively slowly (for example, RAM) and \"accessing an unpredictable sequence of locations\" within it. A block should be large enough to make preserving the data more advantageous than recomputing it for each access. The algorithm also should prevent internal parallelism, hence N simultaneous threads should require N times more memory at once.",
      3 => "Dwork et al investigated and formalized this approach leading them to suggest another variant of the pricing function: \"Mbound\". One more work belongs to F. Coelho, who proposed the most effective solution: \"Hokkaido\".",
      4 => "To our knowledge the last work based on the idea of pseudo-random searches in a big array is the algorithm known as \"scrypt\" by C. Percival. Unlike the previous functions it focuses on key derivation, and not proof-of-work systems. Despite this fact scrypt can serve our purpose: it works well as a pricing function in the partial hash conversion problem such as SHA-256 in Bitcoin.",
      5 => "By now scrypt has already been applied in Litecoin and some other Bitcoin forks. However, its implementation is not really memory-bound: the ratio \"memory access time / overall time\" is not large enough because each instance uses only 128 KB. This permits GPU miners to be roughly 10 times more effective and continues to leave the possibility of creating relatively cheap but highly-efficient mining devices.",
      6 => "Moreover, the scrypt construction itself allows a linear trade-off between memory size and CPU speed due to the fact that every block in the scratchpad is derived only from the previous.  For example, you can store every second block and recalculate the others in a lazy way, i.e. only when it becomes necessary.",
   ],

   'The proposed algorithm' => [
      0 => "We propose a new memory-bound algorithm for the proof-of-work pricing function. It relies on random access to a slow memory and emphasizes latency dependence. As opposed to scrypt every new block (64 bytes in length) depends on all the previous blocks. As a result a hypothetical \"memory-saver\" should increase his calculation speed exponentially.",
      1 => "Our algorithm requires about 2 Mb per instance for the following reasons:",
      2 => [
         'code' => "1. It fits in the L3 cache (per core) of modern processors, which should become mainstream in a few years;",
      ],
      3 => [
         'code' => "2. A megabyte of internal memory is an almost unacceptable size for a modern ASIC pipeline;",
      ],
      4 => [
         'code' => "3. GPUs may run hundreds of concurrent instances, but they are limited in other ways: GDDR5 memory is slower than the CPU L3 cache and remarkable for its bandwidth, not random access speed.",
      ],
      5 => [
         'code' => "4. Significant expansion of the scratchpad would require an increase in iterations, which in turn implies an overall time increase. \"Heavy\" calls in a trust-less p2p network may lead to serious vulnerabilities, because nodes are obliged to check every new block's proof-of-work. If a node spends a considerable amount of time on each hash evaluation, it can be easily DDoSed by a flood of fake objects with arbitrary work data (nonce values).",
      ],
   ],

   'Smooth emission' => [
      0 => "The upper bound for the overall amount of _PROTOCOL_ digital coins is: MSupply = 2^64 - 1 atomic units. This is a natural restriction based only on implementation limits, not on intuition such as \"N coins ought to be enough for anybody\".  To ensure the smoothness of the emission process we use the following formula for block rewards:BaseReward = (MSupply - A) >> 18, where A is amount of previously generated coins.",

   ],

   'Difficulty' => [
      0 => "_PROTOCOL_ contains a targeting algorithm which changes the difficulty of every block. This decreases the system's reaction time when the network hashrate is intensely growing or shrinking, preserving a constant block rate. The original Bitcoin method calculates the relation of actual and target time-span between the last 2016 blocks and uses it as the multiplier for the current difficulty. Obviously this is unsuitable for rapid recalculations (because of large inertia) and results in oscillations.",
      1 => "The general idea behind our algorithm is to sum all the work completed by the nodes and divide it by the time they have spent. The measure of work is the corresponding difficulty values in each block. But due to inaccurate and untrusted timestamps we cannot determine the exact time interval between blocks. A user can shift his timestamp into the future and the next time intervals might be improbably small or even negative. Presumably there will be few incidents of this kind, so we can just sort the timestamps and cut-off the outliers (i.e. 20%). The range of the rest values is the time which was spent for 80% of the corresponding blocks.",
   ],

   'Size limits' => [
      0 => "Users pay for storing the blockchain and shall be entitled to vote for its size. Every miner deals with the trade-off between balancing the costs and profit from the fees and sets his own \"soft-limit\" for creating blocks. Also the core rule for the maximum block size is necessary for preventing the blockchain from being flooded with bogus transaction, however this value should not be hard-coded.",
      1 => "Let MN be the median value of the last N blocks sizes. Then the \"hard-limit\" for the size of accepting blocks is 2 * MN . It averts the blockchain from bloating but still allows the limit to slowly grow with time if necessary.",
      2 => "Transaction size does not need to be limited explicitly. It is bounded by the size of a block; and if somebody wants to create a huge transaction with hundreds of inputs/outputs (or with the high ambiguity degree in ring signatures), he can do so by paying sufficient fee.",
   ],

   'Excess size penalty' => [
      0 => "A miner still has the ability to stuff a block full of his own zero-fee transactions up to its maximum size 2 * Mb. Even though only the majority of miners can shift the median value, there is still a possibility to bloat the blockchain and produce an additional load on the nodes. To discourage malevolent participants from creating large blocks we introduce a penalty function:",
      1 => [
         'img' => '/img/cryptonote/014.png',
      ],
      2 => "This rule is applied only when BlkSize is greater than minimal free block size which should be close to max(10kb, MN · 110%). Miners are permitted to create blocks of \"usual size\" and even exceed it with profit when the overall fees surpass the penalty. But fees are unlikely to grow quadratically unlike the penalty value so there will be an equilibrium.",
   ],

   'Conclusion' => [
      0 => "We have investigated the major flaws in Bitcoin and proposed some possible solutions. These ad- vantageous features and our ongoing development make new electronic cash system _PROTOCOL_ a serious rival to Bitcoin, outclassing all its forks.",
      1 => "Nobel prize laureate Friedrich Hayek in his famous work proves that the existence of con- current independent currencies has a huge positive effect. Each currency issuer (or developer in our case) is trying to attract users by improving his product. Currency is like a commodity: it can have unique benefits and shortcomings and the most convenient and trusted currency has the greatest demand. Suppose we had a currency excelling Bitcoin: it means that Bitcoin would develop faster and become better. The biggest support as an open source project would come from its own users, who are interested in it.",
      2 => "We do not consider _PROTOCOL_ as a full replacement to Bitcoin. On the contrary, having two (or more) strong and convenient currencies is better than having just one. Running two and more different projects in parallel is the natural flow of electronic cash economics.",
   ],

   'References' => [
      0 => "http://bitcoin.org.",
      1 => "",
      2 => "https://en.bitcoin.it/wiki/Category:Mixing Services.",
      3 => "",
      4 => "http://blog.ezyang.com/2012/07/secure-multiparty-bitcoin-anonymization.",
      5 => "",
      6 => "https://bitcointalk.org/index.php?topic=279249.0.",
      7 => "",
      8 => "http://msrvideo.vo.msecnd.net/rmcvideos/192058/dl/192058.pdf.",
      9 => "",
      10 => "https://github.com/bitcoin/bips/blob/master/bip-0034.mediawiki#Specification.",
      11 => "",
      12 => "https://github.com/bitcoin/bips/blob/master/bip-0016.mediawiki#Backwards Compatibility.",
      13 => "",
      14 => "https://en.bitcoin.it/wiki/Mining hardware comparison.",
      15 => "",
      16 => "https://github.com/bitcoin/bips/blob/master/bip-0050.mediawiki.",
      17 => "",
      18 => "http://luke.dashjr.org/programs/bitcoin/files/charts/branches.html.",
      19 => "",
      20 => "https://bitcointalk.org/index.php?topic=196259.0.",
      21 => "",
      22 => "https://en.bitcoin.it/wiki/Contracts.",
      23 => "",
      24 => "https://en.bitcoin.it/wiki/Script.",
      25 => "",
      26 => "http://litecoin.org.",
      27 => "",
      28 => "Martin Abadi, Michael Burrows, and Ted Wobber. Moderately hard, memory-bound functions. In NDSS, 2003.",
      29 => "",
      30 => "Ben Adida, Susan Hohenberger, and Ronald L. Rivest. Ad-hoc-group signatures from hijacked keypairs. In in DIMACS Workshop on Theft in E-Commerce, 2005.",
      31 => "",
      32 => "Man Ho Au, Sherman S. M. Chow, Willy Susilo, and Patrick P. Tsang. Short linkable ring signatures revisited. In EuroPKI, pages 101-115, 2006.",
      33 => "",
      34 => "Daniel J. Bernstein, Niels Duif, Tanja Lange, Peter Schwabe, and Bo-Yin Yang. High-speed high-security signatures. J. Cryptographic Engineering, 2(2):77-89, 2012.",
      35 => "",
      36 => "David Chaum and Eug`ene van Heyst. Group signatures. In EUROCRYPT, pages 257-265, 1991.",
      37 => "",
      38 => "Fabien Coelho. Exponential memory-bound functions for proof of work protocols. IACR Cryptology ePrint Archive, 2005:356, 2005.",
      39 => "",
      40 => "Ronald Cramer, Ivan Damg ̊ard, and Berry Schoenmakers. Proofs of partial knowledge and simplified design of witness hiding protocols. In CRYPTO, pages 174-187, 1994.",
      41 => "",
      42 => "Cynthia Dwork, Andrew Goldberg, and Moni Naor. On memory-bound functions for fighting spam. In CRYPTO, pages 426-444, 2003.",
      43 => "",
      44 => "Eiichiro Fujisaki. Sub-linear size traceable ring signatures without random oracles. In CT- RSA, pages 393-415, 2011.",
      45 => "",
      46 => "Eiichiro Fujisaki and Koutarou Suzuki. Traceable ring signature. In Public Key Cryptogra- phy, pages 181-200, 2007.",
      47 => "",
      48 => "Jezz Garzik. Peer review of \"quantitative analysis of the full bitcoin transaction graph\". https://gist.github.com/3901921, 2012.",
      49 => "",
      50 => "Joseph K. Liu, Victor K. Wei, and Duncan S. Wong. Linkable spontaneous anonymous group signature for ad hoc groups (extended abstract). In ACISP, pages 325-335, 2004.",
      51 => "",
      52 => "Joseph K. Liu and Duncan S. Wong. Linkable ring signatures: Security models and new schemes. In ICCSA (2), pages 614-623, 2005.",
      53 => "",
      54 => "Ian Miers, Christina Garman, Matthew Green, and Aviel D. Rubin. Zerocoin: Anonymous distributed e-cash from bitcoin. In IEEE Symposium on Security and Privacy, pages 397- 411, 2013.",
      55 => "",
      56 => "Micha Ober, Stefan Katzenbeisser, and Kay Hamacher. Structure and anonymity of the bitcoin transaction graph. Future internet, 5(2):237-250, 2013.",
      57 => "",
      58 => "Tatsuaki Okamoto and Kazuo Ohta. Universal electronic cash. In CRYPTO, pages 324-337, 1991.",
      59 => "",
      60 => "Marc Santamaria Ortega. The bitcoin transaction graph — anonymity. Master’s thesis, Universitat Oberta de Catalunya, June 2013.",
      61 => "",
      62 => "Colin Percival. Stronger key derivation via sequential memory-hard functions. Presented at BSDCan’09, May 2009.",
      63 => "",
      64 => "Fergal Reid and Martin Harrigan. An analysis of anonymity in the bitcoin system. CoRR, abs/1107.4524, 2011.",
      65 => "",
      66 => "Ronald L. Rivest, Adi Shamir, and Yael Tauman. How to leak a secret. In ASIACRYPT, pages 552-565, 2001.",
      67 => "",
      68 => "Dorit Ron and Adi Shamir. Quantitative analysis of the full bitcoin transaction graph. IACR Cryptology ePrint Archive, 2012:584, 2012.",
      69 => "",
      70 => "Meni Rosenfeld. Analysis of hashrate-based double-spending. 2012.",
      71 => "",
      72 => "Maciej Ulas. Rational points on certain hyperelliptic curves over finite fields. Bulletin of the Polish Academy of Sciences. Mathematics, 55(2):97-104, 2007.",
      73 => "",
      74 => "Qianhong Wu, Willy Susilo, Yi Mu, and Fangguo Zhang. Ad hoc group signatures. In IWSEC, pages 120-135, 2006.",
      75 => "",
   ],





];