# RenalInfoLK Web Theme - Package Script
# Creates distribution-ready ZIP file

Write-Host "========================================" -ForegroundColor Cyan
Write-Host "RenalInfoLK Web Theme - Package Script" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

# Get theme directory
$themeDir = $PSScriptRoot
$parentDir = Split-Path $themeDir -Parent
$themeName = Split-Path $themeDir -Leaf
$version = "1.0.0"
$zipName = "renalinfo-web-$version.zip"
$zipPath = Join-Path $parentDir $zipName

Write-Host "Theme Directory: $themeDir" -ForegroundColor Yellow
Write-Host "Output ZIP: $zipPath" -ForegroundColor Yellow
Write-Host ""

# Check if theme directory exists
if (-not (Test-Path $themeDir)) {
    Write-Host "ERROR: Theme directory not found!" -ForegroundColor Red
    exit 1
}

# Files and directories to EXCLUDE from ZIP
$excludePatterns = @(
    ".git",
    ".gitignore",
    ".specify",
    "node_modules",
    ".DS_Store",
    "__MACOSX",
    "Thumbs.db",
    "*.log",
    "CLAUDE.md",
    "PROGRESS-REPORT.md",
    "SCREENSHOT-PLACEHOLDER.md",
    "Sample Datas",
    ".vscode",
    ".idea",
    "package.json",
    "package-lock.json",
    "composer.json",
    "composer.lock",
    "*.zip"
)

Write-Host "Step 1: Validating theme files..." -ForegroundColor Green

# Check required files exist
$requiredFiles = @(
    "style.css",
    "functions.php",
    "theme.json",
    "README.txt",
    "LICENSE.txt"
)

$missingFiles = @()
foreach ($file in $requiredFiles) {
    $filePath = Join-Path $themeDir $file
    if (-not (Test-Path $filePath)) {
        $missingFiles += $file
    }
}

if ($missingFiles.Count -gt 0) {
    Write-Host "ERROR: Missing required files:" -ForegroundColor Red
    $missingFiles | ForEach-Object { Write-Host "  - $_" -ForegroundColor Red }
    exit 1
}

Write-Host "  ✓ All required files present" -ForegroundColor Green
Write-Host ""

Write-Host "Step 2: Checking version numbers..." -ForegroundColor Green

# Check version in style.css
$styleCss = Get-Content (Join-Path $themeDir "style.css") -Raw
if ($styleCss -match "Version:\s*(.+)") {
    $styleVersion = $matches[1].Trim()
    if ($styleVersion -ne $version) {
        Write-Host "  WARNING: style.css version ($styleVersion) doesn't match expected ($version)" -ForegroundColor Yellow
    } else {
        Write-Host "  ✓ style.css version: $styleVersion" -ForegroundColor Green
    }
}

# Check version in README.txt
$readme = Get-Content (Join-Path $themeDir "README.txt") -Raw
if ($readme -match "Stable tag:\s*(.+)") {
    $readmeVersion = $matches[1].Trim()
    if ($readmeVersion -ne $version) {
        Write-Host "  WARNING: README.txt version ($readmeVersion) doesn't match expected ($version)" -ForegroundColor Yellow
    } else {
        Write-Host "  ✓ README.txt stable tag: $readmeVersion" -ForegroundColor Green
    }
}

Write-Host ""

Write-Host "Step 3: Cleaning up development files..." -ForegroundColor Green

# Remove old ZIP if exists
if (Test-Path $zipPath) {
    Remove-Item $zipPath -Force
    Write-Host "  ✓ Removed old ZIP file" -ForegroundColor Green
}

Write-Host ""

Write-Host "Step 4: Creating distribution ZIP..." -ForegroundColor Green
Write-Host "  This may take a moment..." -ForegroundColor Gray

# Create temporary staging directory
$stagingDir = Join-Path $env:TEMP "renalinfo-web-staging"
if (Test-Path $stagingDir) {
    Remove-Item $stagingDir -Recurse -Force
}
New-Item -ItemType Directory -Path $stagingDir | Out-Null

# Copy theme files to staging, excluding patterns
$sourceItems = Get-ChildItem $themeDir -Recurse

$copiedCount = 0
$excludedCount = 0

foreach ($item in $sourceItems) {
    $relativePath = $item.FullName.Substring($themeDir.Length + 1)
    
    # Check if item should be excluded
    $shouldExclude = $false
    foreach ($pattern in $excludePatterns) {
        if ($relativePath -like "*$pattern*" -or $item.Name -like $pattern) {
            $shouldExclude = $true
            break
        }
    }
    
    if ($shouldExclude) {
        $excludedCount++
        continue
    }
    
    # Create destination path
    $destPath = Join-Path $stagingDir $relativePath
    
    # Copy file or create directory
    if ($item.PSIsContainer) {
        if (-not (Test-Path $destPath)) {
            New-Item -ItemType Directory -Path $destPath | Out-Null
        }
    } else {
        $destDir = Split-Path $destPath -Parent
        if (-not (Test-Path $destDir)) {
            New-Item -ItemType Directory -Path $destDir | Out-Null
        }
        Copy-Item $item.FullName $destPath -Force
        $copiedCount++
    }
}

Write-Host "  ✓ Copied $copiedCount files (excluded $excludedCount items)" -ForegroundColor Green

# Create ZIP from staging directory
try {
    # Rename staging directory to theme name
    $finalStagingDir = Join-Path (Split-Path $stagingDir -Parent) $themeName
    if (Test-Path $finalStagingDir) {
        Remove-Item $finalStagingDir -Recurse -Force
    }
    Rename-Item $stagingDir $finalStagingDir
    
    # Create ZIP
    Compress-Archive -Path $finalStagingDir -DestinationPath $zipPath -Force
    
    # Cleanup
    Remove-Item $finalStagingDir -Recurse -Force
    
    Write-Host "  ✓ ZIP file created successfully" -ForegroundColor Green
} catch {
    Write-Host "  ERROR: Failed to create ZIP file" -ForegroundColor Red
    Write-Host "  $_" -ForegroundColor Red
    
    # Cleanup on error
    if (Test-Path $stagingDir) {
        Remove-Item $stagingDir -Recurse -Force
    }
    if (Test-Path $finalStagingDir) {
        Remove-Item $finalStagingDir -Recurse -Force
    }
    
    exit 1
}

Write-Host ""

Write-Host "Step 5: Validating ZIP package..." -ForegroundColor Green

if (Test-Path $zipPath) {
    $zipSize = (Get-Item $zipPath).Length
    $zipSizeMB = [math]::Round($zipSize / 1MB, 2)
    
    Write-Host "  ✓ ZIP file size: $zipSizeMB MB" -ForegroundColor Green
    
    if ($zipSizeMB -gt 10) {
        Write-Host "  WARNING: ZIP file is quite large (>10MB)" -ForegroundColor Yellow
        Write-Host "  Consider optimizing images or removing unnecessary files" -ForegroundColor Yellow
    }
} else {
    Write-Host "  ERROR: ZIP file not found after creation!" -ForegroundColor Red
    exit 1
}

Write-Host ""
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "Package created successfully! ✓" -ForegroundColor Green
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""
Write-Host "Output: $zipPath" -ForegroundColor Yellow
Write-Host ""
Write-Host "Next steps:" -ForegroundColor Cyan
Write-Host "1. Test installation on fresh WordPress" -ForegroundColor White
Write-Host "2. Run Theme Check plugin" -ForegroundColor White
Write-Host "3. Test all features" -ForegroundColor White
Write-Host "4. Submit to WordPress.org (if applicable)" -ForegroundColor White
Write-Host ""

# Ask to open folder
$openFolder = Read-Host "Open output folder? (Y/N)"
if ($openFolder -eq "Y" -or $openFolder -eq "y") {
    Invoke-Item $parentDir
}
