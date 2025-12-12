<!-- Hero Section -->
<section id="home" class="hero">
    <div class="hero-background"></div>
    <div class="container">
        <div class="hero-content">
            <div class="hero-badge">
                <i class="fas fa-star"></i>
                <?= $this->translate('hero_badge') ?? '25+ Years of Excellence' ?>
            </div>
            <h1 class="hero-title"><?= $this->translate('hero_title') ?></h1>
            <p class="hero-subtitle"><?= $this->translate('hero_subtitle') ?></p>
            <div class="hero-buttons">
                <a href="#services" class="btn btn-primary"><i class="fas fa-rocket"></i> <?= $this->translate('cta_discover') ?></a>
                <a href="#contact" class="btn btn-outline"><i class="fas fa-paper-plane"></i> <?= $this->translate('cta_contact') ?></a>
            </div>
            <div class="hero-visual">
                <div class="tech-icons">
                    <div class="tech-icon" title="Database"><i class="fas fa-database"></i></div>
                    <div class="tech-icon" title="Cloud"><i class="fas fa-cloud"></i></div>
                    <div class="tech-icon" title="Code"><i class="fas fa-code"></i></div>
                    <div class="tech-icon" title="Server"><i class="fas fa-server"></i></div>
                    <div class="tech-icon" title="Security"><i class="fas fa-shield-alt"></i></div>
                    <div class="tech-icon" title="DevOps"><i class="fas fa-cogs"></i></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="about section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge"><i class="fas fa-building"></i> <?= $this->translate('about') ?></span>
            <h2 class="section-title"><?= $this->translate('about_title') ?></h2>
        </div>
        <div class="about-content">
            <div class="about-text">
                <p><?= $this->translate('about_text') ?></p>
                <ul class="about-list">
                    <?php 
                    $services = $this->translate('about_services');
                    if (is_array($services)):
                        foreach ($services as $service): 
                    ?>
                        <li><i class="fas fa-check-circle"></i> <?= $service ?></li>
                    <?php 
                        endforeach; 
                    endif;
                    ?>
                </ul>
            </div>
        </div>
        
        <!-- Why Choose Us -->
        <div class="why-choose-us">
            <h3 class="subsection-title"><?= $this->translate('why_choose_title') ?></h3>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-award"></i></div>
                    <h4><?= $this->translate('experience') ?></h4>
                    <p><?= $this->translate('experience_text') ?></p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-certificate"></i></div>
                    <h4><?= $this->translate('quality') ?></h4>
                    <p><?= $this->translate('quality_text') ?></p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-lightbulb"></i></div>
                    <h4><?= $this->translate('innovation') ?></h4>
                    <p><?= $this->translate('innovation_text') ?></p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-handshake"></i></div>
                    <h4><?= $this->translate('support') ?></h4>
                    <p><?= $this->translate('support_text') ?></p>
                </div>
            </div>
        </div>
        
        <!-- Stats -->
        <div class="stats-container">
            <div class="stat-item">
                <span class="stat-number" data-target="25">0</span>
                <span class="stat-label"><?= $this->translate('years_experience') ?></span>
            </div>
            <div class="stat-item">
                <span class="stat-number" data-target="500">0</span>
                <span class="stat-label"><?= $this->translate('projects_completed') ?></span>
            </div>
            <div class="stat-item">
                <span class="stat-number" data-target="200">0</span>
                <span class="stat-label"><?= $this->translate('satisfied_clients') ?></span>
            </div>
            <div class="stat-item">
                <span class="stat-number" data-target="50">0</span>
                <span class="stat-label"><?= $this->translate('experts') ?></span>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="services section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge"><i class="fas fa-cogs"></i> <?= $this->translate('services') ?></span>
            <h2 class="section-title"><?= $this->translate('services_title') ?></h2>
            <p class="section-subtitle"><?= $this->translate('services_subtitle') ?></p>
        </div>
        
        <!-- Service Tabs -->
        <div class="service-tabs">
            <button class="tab-btn active" data-tab="databases"><i class="fas fa-database"></i> <?= $this->translate('databases') ?></button>
            <button class="tab-btn" data-tab="client-server"><i class="fas fa-server"></i> <?= $this->translate('client_server') ?></button>
            <button class="tab-btn" data-tab="methods"><i class="fas fa-project-diagram"></i> <?= $this->translate('methods') ?></button>
            <button class="tab-btn" data-tab="os"><i class="fas fa-desktop"></i> <?= $this->translate('operating_systems') ?></button>
            <button class="tab-btn" data-tab="internet"><i class="fas fa-globe"></i> <?= $this->translate('internet') ?></button>
            <button class="tab-btn" data-tab="programming"><i class="fas fa-code"></i> <?= $this->translate('programming') ?></button>
        </div>
        
        <!-- Tab Contents -->
        <div class="tab-contents">
            <!-- Databases Tab -->
            <div class="tab-content active" id="databases">
                <div class="service-detail">
                    <div class="service-header">
                        <div class="service-icon"><i class="fas fa-database"></i></div>
                        <div>
                            <h3><?= $this->translate('databases') ?></h3>
                            <p class="service-desc"><?= $this->translate('databases_desc') ?></p>
                        </div>
                    </div>
                    
                    <div class="service-sections">
                        <div class="service-section">
                            <h4><i class="fas fa-tools"></i> Technologies</h4>
                            <div class="tags-list">
                                <?php foreach ($this->translate('databases_items') as $item): ?>
                                    <span class="tag"><?= $item ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        
                        <div class="service-section">
                            <h4><i class="fas fa-graduation-cap"></i> <?= $this->translate('competences') ?></h4>
                            <ul class="competences-list">
                                <?php foreach ($this->translate('databases_competences') as $comp): ?>
                                    <li><i class="fas fa-check"></i> <?= $comp ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        
                        <div class="service-section">
                            <h4><i class="fas fa-building"></i> <?= $this->translate('realisations') ?></h4>
                            <div class="realisations-grid">
                                <?php foreach ($this->translate('databases_realisations') as $real): ?>
                                    <div class="realisation-item"><i class="fas fa-check-circle"></i> <?= $real ?></div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Client/Server Tab -->
            <div class="tab-content" id="client-server">
                <div class="service-detail">
                    <div class="service-header">
                        <div class="service-icon"><i class="fas fa-server"></i></div>
                        <div>
                            <h3><?= $this->translate('client_server') ?></h3>
                            <p class="service-desc"><?= $this->translate('client_server_desc') ?></p>
                        </div>
                    </div>
                    
                    <div class="service-sections">
                        <div class="service-section">
                            <h4><i class="fas fa-tools"></i> Technologies</h4>
                            <div class="tags-list">
                                <?php foreach ($this->translate('client_server_items') as $item): ?>
                                    <span class="tag"><?= $item ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        
                        <div class="service-section">
                            <h4><i class="fas fa-graduation-cap"></i> <?= $this->translate('competences') ?></h4>
                            <ul class="competences-list">
                                <?php foreach ($this->translate('client_server_competences') as $comp): ?>
                                    <li><i class="fas fa-check"></i> <?= $comp ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        
                        <div class="service-section">
                            <h4><i class="fas fa-building"></i> <?= $this->translate('realisations') ?></h4>
                            <div class="realisations-grid">
                                <?php foreach ($this->translate('client_server_realisations') as $real): ?>
                                    <div class="realisation-item"><i class="fas fa-check-circle"></i> <?= $real ?></div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Methods Tab -->
            <div class="tab-content" id="methods">
                <div class="service-detail">
                    <div class="service-header">
                        <div class="service-icon"><i class="fas fa-project-diagram"></i></div>
                        <div>
                            <h3><?= $this->translate('methods') ?></h3>
                            <p class="service-desc"><?= $this->translate('methods_desc') ?></p>
                        </div>
                    </div>
                    
                    <div class="service-sections">
                        <div class="service-section">
                            <h4><i class="fas fa-tools"></i> Technologies</h4>
                            <div class="tags-list">
                                <?php foreach ($this->translate('methods_items') as $item): ?>
                                    <span class="tag"><?= $item ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        
                        <div class="service-section">
                            <h4><i class="fas fa-graduation-cap"></i> <?= $this->translate('competences') ?></h4>
                            <ul class="competences-list">
                                <?php foreach ($this->translate('methods_competences') as $comp): ?>
                                    <li><i class="fas fa-check"></i> <?= $comp ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        
                        <div class="service-section">
                            <h4><i class="fas fa-building"></i> <?= $this->translate('realisations') ?></h4>
                            <div class="realisations-grid">
                                <?php foreach ($this->translate('methods_realisations') as $real): ?>
                                    <div class="realisation-item"><i class="fas fa-check-circle"></i> <?= $real ?></div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Operating Systems Tab -->
            <div class="tab-content" id="os">
                <div class="service-detail">
                    <div class="service-header">
                        <div class="service-icon"><i class="fas fa-desktop"></i></div>
                        <div>
                            <h3><?= $this->translate('operating_systems') ?></h3>
                            <p class="service-desc"><?= $this->translate('operating_systems_desc') ?></p>
                        </div>
                    </div>
                    
                    <div class="service-sections">
                        <div class="service-section">
                            <h4><i class="fas fa-tools"></i> Technologies</h4>
                            <div class="tags-list">
                                <?php foreach ($this->translate('operating_systems_items') as $item): ?>
                                    <span class="tag"><?= $item ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        
                        <div class="service-section">
                            <h4><i class="fas fa-graduation-cap"></i> <?= $this->translate('competences') ?></h4>
                            <ul class="competences-list">
                                <?php foreach ($this->translate('operating_systems_competences') as $comp): ?>
                                    <li><i class="fas fa-check"></i> <?= $comp ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        
                        <div class="service-section">
                            <h4><i class="fas fa-building"></i> <?= $this->translate('realisations') ?></h4>
                            <div class="realisations-grid">
                                <?php foreach ($this->translate('operating_systems_realisations') as $real): ?>
                                    <div class="realisation-item"><i class="fas fa-check-circle"></i> <?= $real ?></div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Internet Tab -->
            <div class="tab-content" id="internet">
                <div class="service-detail">
                    <div class="service-header">
                        <div class="service-icon"><i class="fas fa-globe"></i></div>
                        <div>
                            <h3><?= $this->translate('internet') ?></h3>
                            <p class="service-desc"><?= $this->translate('internet_desc') ?></p>
                        </div>
                    </div>
                    
                    <div class="service-sections">
                        <div class="service-section">
                            <h4><i class="fas fa-tools"></i> Technologies</h4>
                            <div class="tags-list">
                                <?php foreach ($this->translate('internet_items') as $item): ?>
                                    <span class="tag"><?= $item ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Programming Tab -->
            <div class="tab-content" id="programming">
                <div class="service-detail">
                    <div class="service-header">
                        <div class="service-icon"><i class="fas fa-code"></i></div>
                        <div>
                            <h3><?= $this->translate('programming') ?></h3>
                            <p class="service-desc"><?= $this->translate('programming_desc') ?></p>
                        </div>
                    </div>
                    
                    <div class="service-sections">
                        <div class="service-section">
                            <h4><i class="fas fa-tools"></i> Technologies</h4>
                            <div class="tags-list">
                                <?php foreach ($this->translate('programming_items') as $item): ?>
                                    <span class="tag"><?= $item ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        
                        <div class="service-section">
                            <h4><i class="fas fa-building"></i> <?= $this->translate('realisations') ?></h4>
                            <div class="realisations-grid">
                                <?php foreach ($this->translate('programming_realisations') as $real): ?>
                                    <div class="realisation-item"><i class="fas fa-check-circle"></i> <?= $real ?></div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Missions Section -->
<section id="missions" class="missions section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?= $this->translate('missions_title') ?></h2>
            <p class="section-subtitle"><?= $this->translate('missions_subtitle') ?></p>
        </div>
        
        <!-- Clients Grid -->
        <div class="clients-grid">
            <?php 
            $clients = $this->translate('missions_clients');
            if (is_array($clients)):
                foreach ($clients as $client): 
            ?>
                <div class="client-card">
                    <h4><i class="fas fa-building"></i> <?= $client['name'] ?></h4>
                    <p><?= $client['description'] ?></p>
                </div>
            <?php 
                endforeach; 
            endif;
            ?>
        </div>
        
        <!-- France Telecom Detailed Missions -->
        <div class="france-telecom-section">
            <h3 class="subsection-title"><?= $this->translate('france_telecom_title') ?></h3>
            <div class="missions-accordion">
                <?php 
                $ftMissions = $this->translate('france_telecom_missions');
                if (is_array($ftMissions)):
                    foreach ($ftMissions as $index => $mission): 
                ?>
                    <div class="accordion-item">
                        <button class="accordion-header" data-index="<?= $index ?>">
                            <span class="mission-title"><i class="fas fa-briefcase"></i> <?= $mission['title'] ?></span>
                            <span class="mission-service"><?= $mission['service'] ?></span>
                            <i class="fas fa-chevron-down accordion-icon"></i>
                        </button>
                        <div class="accordion-content">
                            <div class="mission-detail">
                                <p><strong>Contact:</strong> <?= $mission['contact'] ?></p>
                                <p><strong>Service:</strong> <?= $mission['service'] ?></p>
                                <h5>Tâches:</h5>
                                <ul>
                                    <?php foreach ($mission['tasks'] as $task): ?>
                                        <li><i class="fas fa-check"></i> <?= $task ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php 
                    endforeach; 
                endif;
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact section">
    <div class="container">
        <div class="section-header">
            <span class="section-badge"><i class="fas fa-envelope"></i> <?= $this->translate('contact') ?></span>
            <h2 class="section-title"><?= $this->translate('contact_title') ?></h2>
            <p class="section-subtitle"><?= $this->translate('contact_subtitle') ?></p>
        </div>
        
        <div class="contact-wrapper">
            <div class="contact-form-container">
                <?php if (!empty($contact_message)): ?>
                    <div class="form-message <?= $contact_message_type ?? 'success' ?>">
                        <i class="fas fa-<?= ($contact_message_type ?? 'success') === 'success' ? 'check-circle' : 'exclamation-circle' ?>"></i>
                        <?= $contact_message ?>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($contact_errors['general'])): ?>
                    <div class="form-message error">
                        <i class="fas fa-exclamation-circle"></i>
                        <?= $contact_errors['general'] ?>
                    </div>
                <?php endif; ?>
                
                <form id="contact-form" class="contact-form" method="POST" action="">
                    <div class="form-row">
                        <div class="form-group <?= !empty($contact_errors['name']) ? 'has-error' : '' ?>">
                            <label for="name"><?= $this->translate('name') ?> *</label>
                            <input type="text" id="name" name="name" required value="<?= htmlspecialchars($form_data['name'] ?? '') ?>">
                            <?php if (!empty($contact_errors['name'])): ?>
                                <span class="error-text"><?= $contact_errors['name'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="title"><?= $this->translate('title_field') ?></label>
                            <input type="text" id="title" name="title" value="<?= htmlspecialchars($form_data['title'] ?? '') ?>">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="company"><?= $this->translate('company') ?></label>
                            <input type="text" id="company" name="company" value="<?= htmlspecialchars($form_data['company'] ?? '') ?>">
                        </div>
                        <div class="form-group <?= !empty($contact_errors['email']) ? 'has-error' : '' ?>">
                            <label for="email"><?= $this->translate('email') ?> *</label>
                            <input type="email" id="email" name="email" required value="<?= htmlspecialchars($form_data['email'] ?? '') ?>">
                            <?php if (!empty($contact_errors['email'])): ?>
                                <span class="error-text"><?= $contact_errors['email'] ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="address"><?= $this->translate('address') ?></label>
                        <input type="text" id="address" name="address" value="<?= htmlspecialchars($form_data['address'] ?? '') ?>">
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone"><?= $this->translate('phone') ?></label>
                            <input type="tel" id="phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="fax"><?= $this->translate('fax') ?></label>
                            <input type="text" id="fax" name="fax">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="interest"><?= $this->translate('your_interest') ?></label>
                        <select id="interest" name="interest">
                            <?php 
                            $options = $this->translate('interest_options');
                            if (is_array($options)):
                                foreach ($options as $key => $value): 
                            ?>
                                <option value="<?= $key ?>"><?= $value ?></option>
                            <?php 
                                endforeach; 
                            endif;
                            ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="comments"><?= $this->translate('comments') ?></label>
                        <textarea id="comments" name="comments" rows="5"></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-submit">
                        <i class="fas fa-paper-plane"></i> <?= $this->translate('send_message') ?>
                    </button>
                </form>
                
                <div id="form-message" class="form-message"></div>
            </div>
            
            <div class="contact-info-container">
                <div class="contact-info-card">
                    <h3><i class="fas fa-info-circle"></i> <?= $this->translate('coordinates') ?></h3>
                    <div class="contact-details">
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>contact@fastinternational.com</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <span>+33 1 86 95 49 21</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-fax"></i>
                            <span>+33 1 XX XX XX XX</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Paris, France</span>
                        </div>
                    </div>
                </div>
                
                <!-- PayPal Section -->
                <div class="paypal-card">
                    <h3><i class="fab fa-paypal"></i> <?= $this->translate('paypal_title') ?></h3>
                    <p><?= $this->translate('paypal_desc') ?></p>
                    <a href="https://www.paypal.com/webapps/shoppingcart?flowlogging_id=f467869c0ec9c&mfid=1765305062836_f467869c0ec9c" 
                       target="_blank" 
                       class="btn btn-paypal">
                        <i class="fab fa-paypal"></i> <?= $this->translate('paypal_button') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
