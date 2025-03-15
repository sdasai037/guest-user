<?php
include "nevbar.php";
// Fetch all active footer links grouped by section
$sql = "SELECT section_name, link_text, link_url FROM footer WHERE status = 'active' ORDER BY section_order";
$result = $con->query($sql);

// Organize footer links into sections
$footerSections = [];
while ($row = $result->fetch_assoc()) {
    $footerSections[$row['section_name']][] = [
        'text' => $row['link_text'],
        'url' => $row['link_url']
    ];
}
?>

<footer class="bg-light py-4" style="text-align: justify;">
    <div class="container">
        <div class="row">
            <?php foreach ($footerSections as $sectionName => $links) { ?>
                <div class="col-md-3">
                    <h5 class="h6 fw-bold mb-3"><?php echo $sectionName; ?></h5>
                    <ul class="list-unstyled">
                        <?php foreach ($links as $link) { ?>
                            <li><a href="<?php echo $link['url']; ?>" class="text-dark text-decoration-none"><?php echo $link['text']; ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
        </div>
        <hr>
        <div class="footer-bottom text-center mt-4">
            <p class="fw-bold">Ship to: 🇮🇳 India</p>
            <ul class="list-inline mb-0">
                <li class="list-inline-item"><a href="sign-up.php" class="text-dark text-decoration-none">Sitemap</a></li>
                <li class="list-inline-item"><a href="sign-up.php" class="text-dark text-decoration-none">Legal & Privacy</a></li>
            </ul>
        </div>
    </div>
</footer>