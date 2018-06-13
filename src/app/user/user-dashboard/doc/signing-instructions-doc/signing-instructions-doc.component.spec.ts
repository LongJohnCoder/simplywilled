import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { SigningInstructionsDocComponent } from './signing-instructions-doc.component';

describe('SigningInstructionsDocComponent', () => {
  let component: SigningInstructionsDocComponent;
  let fixture: ComponentFixture<SigningInstructionsDocComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SigningInstructionsDocComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(SigningInstructionsDocComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
